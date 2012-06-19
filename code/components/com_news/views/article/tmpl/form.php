<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.keepalive') ?>
<?= @helper('behavior.validator') ?>

<script>
    window.addEvent('domready', (function(){
    	<? if (!$article->id) : ?>
            new Attachments.Upload({holder: 'news-article-form'});
        <? endif ?>

        var holder = document.id('news-article-form');
        holder.getElement('a.cancel').addEvent('click', function(event) {
            event.stop();
            
            holder.getElement('input[name=action]').set('value', 'cancel');
            holder.getElement('form.-koowa-form').submit();
        });
    }));
</script>

<form action="" method="post" class="-koowa-form" enctype="multipart/form-data">
	<input type="hidden" name="action" value="save" />
	<input type="hidden" name="news_category_id" value="<?= $state->category ?>" />
	
	<div class="component-header">
		<div class="btn-toolbar pull-right">
			<div class="btn-group">
				<input class="btn" type="submit" value="<?= @text('Save') ?>" /><a class="btn" href="#" class="cancel">Cancel</a>
			</div>
		</div>
	</div>
	
	<div id="news-article-form">
		<div class="article article-form">
	        <div class="row-fluid">
	            <div class="span9" style="padding: 20px;">
				   	<input type="text" name="title" class="required" value="<?= @escape($article->title) ?>" placeholder="<?= @text('Title') ?>" />
	                <?
	                    $controller = @service('com://admin/editors.controller.editor');
	                    $controller->getView()->setEditorSettings($editor_settings);
	                    echo $controller->name('text')->data($article->text)->toggle(false)->codemirror(false)->display();
	                ?>
			    </div>
			    
			    <div class="span3">
			        <div class="control-group">
			        	<label class="control-label" for="slug"><?= @text( 'Category' ); ?>:</label>
			        </div>
			    	<div class="controls">
			    		<?= @helper('listbox.categories', array('name' => 'news_category_id', 'selected' => $article->news_category_id, 'attribs' => array('style' => 'width:180px'))) ?>
			    	</div>
			    	
			    	<div class="clearfix attachments">
			    	    <? if ($article->id) : ?>
			    	        <?= @template('com://site/news.view.attachments.default') ?>
			    	    <? endif ?>
			    	    <?= @template('com://admin/attachments.view.attachments.upload') ?>
			    	</div>
			    </div>
		    </div>
		</div>
	</div>
</form>