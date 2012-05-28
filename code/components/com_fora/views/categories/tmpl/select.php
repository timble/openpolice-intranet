<?= @helper('behavior.mootools') ?>

<script>
    window.addEvent('domready', (function(){
        var holder = document.id('fora-topic-forum');
        holder.getElement('a.cancel').addEvent('click', function(event) {
            event.stop();
            window.parent.SqueezeBox.close();
        });

    }));
</script>

<div id="fora-topic-forum">
	<div class="forums">
		<form action="<?=@route('view=topic&id='.$topic->id.'&slug='.$topic->slug)?>" method="post" class="-koowa-form" id="move-form" enctype="multipart/form-data">
		    <input type="hidden" name="action" value="save" />
			<input type="hidden" name="fora_forum_id" value="<?= $topic->fora_forum_id ?>" />
			    
				<?= @helper('tabs.startPane', array('id' => 'default')) ?>
				<? foreach(@service('com://site/fora.model.categories')->getList() as $category) : ?>
					<?= @helper('tabs.startPanel', array('id' => $category->slug, 'title' =>  @escape($category->title))) ?>
					    <div class="control-group" style="margin-left: 20px;">

					    <?= @helper('listbox.radiolist', array(
					    		'list'     => @service('com://site/fora.model.forums')->getList()->find(array('fora_category_id' => $category->id)),
					    		'selected' => $topic->fora_forum_id,
					    		'name'     => 'fora_forum_id',
					            'text'     => 'title'
					    	));
					    ?>
					    </div>
					<?= @helper('tabs.endPanel') ?>
				<? endforeach ?>
				<?= @helper('tabs.endPane') ?>
			
		    <div class="form-actions">
			    <input type="submit" class="btn btn-primary" value="<?= @text('Move') ?>" /> <?= @text('or') ?> <a href="#" class="cancel">Cancel</a>
		    </div>
		</form>
	</div>
</div>