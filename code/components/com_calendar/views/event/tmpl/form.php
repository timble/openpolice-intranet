<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.keepalive') ?>
<?= @helper('behavior.validator') ?>

<script>
    window.addEvent('domready', (function(){
        var holder = document.id('calendar-event-form');
        holder.getElement('a.cancel').addEvent('click', function(event) {
            event.stop();
            
            holder.getElement('input[name=action]').set('value', 'cancel');
            holder.getElement('form.-koowa-form').submit();
        });

        new Attachments.Upload({holder: 'calendar-event-form'});
    }));
</script>

<div id="calendar-event-form">
	<div class="event event-form">
		<form action="" method="post" class="-koowa-form" enctype="multipart/form-data">
            <input type="hidden" name="action" value="save" />
            
            <div style="padding: 20px;">

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
	            
			    <div class="clearfix attachments">
                    <?= @template('com://admin/attachments.view.attachments.upload') ?>
			    </div>
		    </div>
		    <div class="form-actions">
			    <span class="btn-group">
			    	<input class="btn btn-primary" type="submit" value="<?= @text('Save') ?>" />
			    	<a class="btn btn-danger" href="#"><?= @text('Delete') ?></a>
			    </span>
			    <span style="line-height: 28px;"><?= @text('or') ?> <a href="#" class="cancel">Cancel</a></span>
		    </div>
		</form>
	</div>
</div>