<?php
/**
 * @version     $Id: uploader.php 1429 2012-01-20 17:16:12Z ercanozkaya $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Files
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
defined('KOOWA') or die( 'Restricted access' ); ?>

<style src="media://com_files/plupload/jquery.plupload.queue/css/jquery.plupload.queue.css" />

<script src="media://com_files/plupload/plupload.js" />
<script src="media://com_files/plupload/plupload.html5.js" />
<script src="media://com_files/plupload/plupload.html4.js" />
<script src="media://com_files/plupload/plupload.flash.js" />

<script src="media://com_files/plupload/jquery-1.6.4.min.js" />
<script src="media://com_files/plupload/jquery.plupload.queue/jquery.plupload.queue.js" />

<script>
jQuery.noConflict();

window.addEvent('domready', function() {
	var element = jQuery('#files-upload-multi');

	plupload.addI18n({'Add files': Files._('Select files from your computer')});

	element.pluploadQueue({
		runtimes: 'html5,flash,html4',
		browse_button: 'pickfiles',
		dragdrop: true,
		rename: true,
		url: '', // this is added on the go in BeforeUpload event
		flash_swf_url: 'media://com_files/plupload/plupload.flash.swf',
		urlstream_upload: true, // required for flash
		multipart_params: {
			action: 'add',
			_token: Files.token
		},
		headers: {
			'X-Requested-With': 'xmlhttprequest'
		}
	});

	var uploader = element.pluploadQueue(),
		//We only want to run this once
		exposePlupload = function(uploader) {
			document.id('files-upload').addClass('uploader-files-queued').removeClass('uploader-files-empty');
			if(document.id('files-upload-multi_browse')) {
				document.id('files-upload-multi_browse').set('text', 'Add files');
			}
			if(SqueezeBox.isOpen) SqueezeBox.resize({y: $('files-upload').measure(function(){return this.getSize().y;})}, true);
			uploader.unbind('QueueChanged', exposePlupload);
		};

	if(uploader.features.dragdrop) {
		document.id('files-upload').addClass('uploader-droppable');
	} else {
		document.id('files-upload').addClass('uploader-nodroppable');
	}

	uploader.bind('QueueChanged', exposePlupload);

	uploader.bind('BeforeUpload', function(uploader, file) {
		// set directory in the request
		uploader.settings.url = Files.app.createRoute({
			view: 'file',
			plupload: 1,
			folder: Files.app.getPath()
		});
	});

	uploader.bind('UploadComplete', function(uploader) {
		jQuery('li.plupload_delete a,div.plupload_buttons', element).show();
	});

	// Keeps track of failed uploads and error messages so we can later display them in the queue
	var failed = {};
	uploader.bind('FileUploaded', function(uploader, file, response) {
		var json = JSON.decode(response.response, true) || {};
		if (json.status) {
			var item = json.item;
			var cls = Files[item.type.capitalize()];
			var row = new cls(item);
			Files.app.grid.insert(row);
			if (row.type == 'image' && Files.app.grid.layout == 'icons') {
				var image = row.element.getElement('img');
				if (image) {
					row.getThumbnail(function(response) {
						if (response.item.thumbnail) {
							image.set('src', response.item.thumbnail).addClass('loaded').removeClass('loading');
							row.element.getElement('.files-node').addClass('loaded').removeClass('loading');
						}
					});

					/* @TODO Test if this is necessary: This is for the thumb margins to recalculate */
					window.fireEvent('resize');
				}
			}
			Files.app.fireEvent('uploadFile', [row]);
		} else {
			var error = json.error ? json.error : 'Unknown error';

			failed[file.id] = error;
		}
	});

	uploader.bind('StateChanged', function(uploader) {
		$each(failed, function(error, id) {
			icon = jQuery('#' + id).attr('class', 'plupload_failed').find('a').css('display', 'block');
			if (error) {
				icon.attr('title', error);
			}
		});

	});

	$$('.plupload_clear').addEvent('click', function(e) {
		e.stop();

		// need to work on a clone, otherwise iterator gets confused after elements are removed
		var files = uploader.files.slice(0);
		files.each(function(file) {
			uploader.removeFile(file);
		});
	});

	Files.app.uploader = uploader;

	/**
	 * Switcher between uploaders
	 */
	var toggleForm = function(type) {
		$$('.upload-form').setStyle('display', 'none');
		document.id('files-uploader-'+type).setStyle('display', 'block');

		// Plupload needs to be refreshed if it was hidden
		if (type == 'computer') {
			var uploader = jQuery('#files-upload-multi').pluploadQueue();
			uploader.refresh();
			if(!uploader.files.length) {
				document.id('files-upload').removeClass('uploader-files-queued').addClass('uploader-files-empty');
				if(document.id('files-upload-multi_browse')) {
					document.id('files-upload-multi_browse').set('text', 'Select files from your computer');
					uploader.bind('QueueChanged', exposePlupload);
				}
			}
		}

		SqueezeBox.fx.win.start({height: $('files-upload').measure(function(){return this.getSize().y;})});
	};

	$$('.upload-form-toggle').addEvent('click', function(e) {
		var hash = this.get('href').split('#')[1];
		$$('.upload-form-toggle').removeClass('active');
		e.preventDefault();
		this.addClass('active');

		toggleForm(hash);
	});
});

/**
 * Remote file form
 */
window.addEvent('domready', function() {
	var form = document.id('remoteForm'), filename = document.id('remote-name'),
		submit = form.getElement('.remote-submit'), submit_default = submit.get('value'),
		setRemoteWrapMargin = function(){
			form.getElement('.remote-wrap').setStyle('margin-right', submit.measure(function(){return this.getSize().x}));
		},
		input = document.id('remote-url'),
		current_url,
		validate = new Request.JSON({
			onRequest: function(){
				if(current_url != this.options.url) {
					submit.set('value', submit_default);
					setRemoteWrapMargin();
					current_url = this.options.url;
				}
			},
			onSuccess: function(response){
				if(response.error) return this.fireEvent('failure', this.xhr);

				var length = response['content-length'].toInt(10);
				if(length && length < Files.app.container.parameters.maximum_size) {
					var size = new Files.Filesize(length).humanize();
					submit.addClass('valid').set('value', submit_default+' ('+size+')');
					setRemoteWrapMargin();
				} else {
					submit.removeClass('valid');
				}

			},
			onFailure: function(xhr){
				var response = JSON.decode(xhr.responseText, true);
				if (response.code && parseInt(response.code/100, 10) == 4) {
					submit.removeClass('valid');
				}		
				else {
					submit.addClass('valid');
				}
			}
		});
 
 	var default_filename;
 	input.addEvent('focus', function(){
 		this.set('placeholder', this.get('title')).removeClass('success');
 	});
	input.addEvent('blur', function(e) {
		if (this.value) {
			if (Files.app.container.parameters.maximum_size) {
				validate.setOptions({url: Files.app.createRoute({view: 'proxy', url: this.value})}).get();
			}
			else {
				submit.addClass('valid');
			}
			
			if(!filename.get('value') || filename.get('value') == default_filename) {
				default_filename = new URI(this.value).get('file');
				filename.set('value', default_filename);
			}
		} else {
			submit.set('value', submit_default).removeClass('valid');
			setRemoteWrapMargin();
		}
	});

	var validateInput = function(){
			var value = this.value.trim(), host = new URI(value).get('host');
    		if(value && host && value.match(host)) {
    			submit.addClass('valid').removeProperty('disabled');
    		} else {
    			submit.removeClass('valid').setProperty('disabled', 'disabled');
    		}
    	};
    	input.addEvent('change', validateInput);
    	if(window.addEventListener) {
    		input.addEventListener('input', validateInput);
    	} else {
    		input.addEvent('keyup', validateInput);
    	}

	var request = new Request.JSON({
		url: Files.app.createRoute({view: 'file', folder: Files.app.getPath()}),
		data: {
			action: 'add',
			_token: Files.token,
			file: ''
		},
		onSuccess: function(json) {
			if (this.status == 201 && json.status) {
				var el = json.item;
				var cls = Files[el.type.capitalize()];
				var row = new cls(el);
				Files.app.grid.insert(row);
				if (row.type == 'image' && Files.app.grid.layout == 'icons') {
					var image = row.element.getElement('img');
					if (image) {
						row.getThumbnail(function(response) {
							if (response.item.thumbnail) {
								image.set('src', response.item.thumbnail).addClass('loaded').removeClass('loading');
								row.element.getElement('.files-node').addClass('loaded').removeClass('loading');
							}
						});
						/* @TODO Test if this is necessary: This is for the thumb margins to recalculate */
						window.fireEvent('resize');
					}
				}
				Files.app.fireEvent('uploadFile', [row]);
				submit.removeClass('valid').set('value', submit_default);
				setRemoteWrapMargin();
				form.reset();
				input.set('placeholder', Files._('Uploaded successfully!')).addClass('success');
			} else {
				var error = json.error ? json.error : Files._('Unknown error');
				alert(Files._('An error occurred: ') + error);
			}
		},
		onFailure: function(xhr) {
			alert(Files._('An error occurred with status code: ')+xhr.status);
		}
	});
	form.addEvent('submit', function(e) {
		e.stop();
		request.options.data.file = document.id('remote-url').get('value');
		request.options.url = Files.app.createRoute({
			view: 'file',
			folder: Files.app.getPath(),
			name: document.id('remote-name').get('value')
		});
		request.send();
	});

	//Width fix
	setRemoteWrapMargin();
});
</script>

<div id="files-upload" style="clear: both" class="uploader-files-empty">
	<div id="files-upload-controls">
		<ul class="upload-buttons">
			<li><?= @text('Upload from:') ?></li>
			<li><a class="upload-form-toggle target-computer active" href="#computer"><?= @text('Computer'); ?></a></li>
			<li><a class="upload-form-toggle target-web" href="#web"><?= @text('Web'); ?></a></li>
			<li id="upload-max">
				<?= @text('Each file should be smaller than'); ?>
				<span id="upload-max-size"></span>
			</li>
		</ul>
	</div>
	<div class="clr"></div>
	<div id="files-uploader-computer" class="upload-form">

		<div style="clear: both"></div>

		<div id="files-upload-multi"></div>

	</div>
	<div class="clr"></div>
	<div id="files-uploader-web" class="upload-form" style="display: none">
		<form action="" method="post" name="remoteForm" id="remoteForm" >
			<div class="remote-wrap">
				<input type="text" placeholder="<?= @text('Remote URL') ?>" title="<?= @text('Remote URL') ?>" id="remote-url" name="file" size="50" />
				<input type="text" placeholder="<?= @text('File name') ?>" id="remote-name" name="name" />
			</div>
			<input type="submit" class="remote-submit" value="<?= @text('Transfer File'); ?>" />
			<input type="hidden" name="action" value="save" />
			</fieldset>
		</form>
	</div>
</div>
