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

<div id="news-article-form">
	<div class="article article-form">
		<form action="" method="post" class="-koowa-form" enctype="multipart/form-data">
            <input type="hidden" name="action" value="save" />
		    <input type="hidden" name="news_category_id" value="<?= $state->category ?>" />
            
            <div style="padding: 20px;">
			   	<input type="text" name="title" class="required" value="<?= @escape($article->title) ?>" placeholder="<?= @text('Title') ?>" />
                
                <?
                    $controller = @service('com://admin/editors.controller.editor');
                    $controller->getView()->setEditorSettings($editor_settings);
                    echo $controller->name('text')->data($article->text)->toggle(false)->codemirror(false)->display();
                ?>

			    <div class="clearfix attachments">
                    <? if ($article->id) : ?>
                        <?= @template('com://site/news.view.attachments.default') ?>
                    <? endif ?>
                    <?= @template('com://admin/attachments.view.attachments.upload') ?>
			    </div>
		    </div>
		    <div class="form-actions">
			    <input class="btn btn-primary" type="submit" value="<?= @text('Save') ?>" /> <?= @text('or') ?> <a href="#" class="cancel">Cancel</a>
		    </div>
		</form>
	</div>
</div>