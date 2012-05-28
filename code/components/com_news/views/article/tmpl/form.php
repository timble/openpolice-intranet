<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.keepalive') ?>
<?= @helper('behavior.validator') ?>

<script>
    window.addEvent('domready', (function(){
    	<? if (!$article->id) : ?>
            new Attachments.Upload({holder: 'fora-article-form'});
        <? endif ?>

        var holder = document.id('fora-article-form');
        holder.getElement('a.cancel').addEvent('click', function(event) {
            event.stop();
            
            holder.getElement('input[name=action]').set('value', 'cancel');
            holder.getElement('form.-koowa-form').submit();
        });
    }));
</script>

<div id="fora-article-form">
	<div class="frame">
		<div class="content">
			<form action="" method="post" class="-koowa-form form-stacked" enctype="multipart/form-data">
                <input type="hidden" name="action" value="save" />
			    <input type="hidden" name="news_category_id" value="<?= $state->category ?>" />
                
                <div class="spacing">
				    <h2><?= @text($article->id ? 'Edit' : 'New') ?></h2>
				    <div class="control-group">
				    	<label class="control-label" for="title"><?= @text('Subject') ?></label>
				    	<div class="controls">
				    	    <input type="text" name="title" class="required" value="<?= @escape($article->title) ?>" />
				    	</div>
				    </div>
				    <div class="control-group">
				        <? if ($agent) : ?>
				        <label class="control-label" for="slug"><?= @text('Slug') ?></label>
				        <div class="controls">
				            <input type="text" name="slug" value="<?= $article->slug ?>" placeholder="<?= @text('Slug') ?>" />
				        </div>
				        <? endif ?>
				    </div>
				    <div class="control-group">
				    	<label class="control-label" for="text"><?= @text('Text') ?></label>
				    	<div class="controls">
	                        <?
	                            $controller = @service('com://admin/editors.controller.editor');
	                            $controller->getView()->setEditorSettings($editor_settings);
	                            echo $controller->name('text')->data($article->text)->toggle(false)->codemirror($agent)->display();
	                        ?>
	                    </div>
				    </div>
				    <div class="clearfix attachments">
	                    <? if ($article->id) : ?>
	                        <?= @template('com://site/fora.view.attachments.default') ?>
	                    <? else : ?>
				    	    <?= @template('com://admin/attachments.view.attachments.upload') ?>
	                    <? endif ?>
				    </div>
			    </div>
			    <div class="form-actions">
				    <input class="btn btn-primary" type="submit" value="<?= @text('Save') ?>" /> <?= @text('or') ?> <a href="#" class="cancel">Cancel</a>
			    </div>
			</form>
		</div>
	</div>
</div>