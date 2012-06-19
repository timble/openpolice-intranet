<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.keepalive') ?>
<?= @helper('behavior.validator') ?>

<script>
    window.addEvent('domready', (function(){
        var toolbar = document.id('event-form-toolbar');
        toolbar.getElement('a.cancel').addEvent('click', function(event) {
            event.stop();
            
            document.id('calendar-event-form').getElement('input[name=action]').set('value', 'cancel');
            document.id('calendar-event-form').submit();
        });

        new Attachments.Upload({holder: 'calendar-event-form'});
    }));
</script>

<form action="" method="post" id="calendar-event-form" class="-koowa-form" enctype="multipart/form-data">
	<input type="hidden" name="action" value="save" />
	
	<div class="component-header">
		<?= @template('form_scopebar') ?>
	</div>
	
	<div style="padding: 20px;">
		<div class="row-fluid">
			<div class="event-form span9">	
			   	<input type="text" name="title" class="required" value="<?= @escape($event->title) ?>" placeholder="<?= @text('Title') ?>" />
			   	
			   	<div class="controls">
				   	<div class="input-prepend input-append">
				   	<span class="add-on"><?=@text( 'Start' )?></span><?= @helper('com://site/news.template.helper.behavior.calendar',
				   			array(
				   				'date' => $event->start_date,
				   				'name' => 'start_date',
				   				'format' => '%Y-%m-%d %H:%M:%S',
				   				'attribs' => array('style' => 'width: 120px')
				   			)); ?>
				   	</div>
			   	</div>
			   	
			   	<div class="controls">
			   		<div class="input-prepend input-append">
			   		<span class="add-on"><?=@text( 'End' )?></span><?= @helper('com://site/news.template.helper.behavior.calendar',
			   				array(
			   					'date' => $event->end_date,
			   					'name' => 'end_date',
			   					'format' => '%Y-%m-%d %H:%M:%S',
			   					'attribs' => array('style' => 'width: 120px')
			   				)); ?>
			   		</div>
			   	</div>
			
		        <?
		            $controller = @service('com://admin/editors.controller.editor');
		            $controller->getView()->setEditorSettings($editor_settings);
		            echo $controller->name('description')->data($event->description)->toggle(false)->codemirror(false)->display();
		        ?>
	        </div>
	        
		    <div class="clearfix attachments span3">
	            <?= @template('com://admin/attachments.view.attachments.upload') ?>
		    </div>
	    </div>
	</div>
</form>
