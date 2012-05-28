<?= @helper('behavior.mootools') ?>
<script src="media://com_fora/js/search.js" />

<script>
    window.addEvent('domready', (function() {
        var form = document.getElement('#fora-categories-default form[name=search]');
        
        new Fora.Search({
            text: form.getElement('input[name=search]'),
            button: form.getElement('input[type=submit]')
        });
    }));
</script>

<div id="fora-categories-default">
	<div class="frame">
	    <form action="<?= @route('view=topics') ?>" method="get" name="search">
	    	<input name="search" type="text" placeholder="<?= @text('Search all categories...') ?>">
	    	<input class="btn primary" type="submit" value="Search" disabled="disabled">
	    </form>
	</div>
	
	<div class="frame">
		<div class="content group">
		<? foreach($categories as $category) : ?>
		    <?= @template('com://site/fora.view.category.default_items',
		        array('category' => $category, 'forums' => $forums, 'topics' => $topics, 'topics_count' => $topics_count)); ?>
		<? endforeach ?>
		</div>
	</div>

</div>