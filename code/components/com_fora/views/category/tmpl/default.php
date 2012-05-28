<?= @helper('behavior.mootools') ?>
<script src="media://com_fora/js/search.js" />

<script>
    window.addEvent('domready', (function() {
        var form = document.getElement('#fora-category-default form[name=search]');
        
        new Fora.Search({
            text: form.getElement('input[name=search]'),
            button: form.getElement('input[type=submit]')
        });
    }));
</script>

<div id="fora-category-default">
	<div class="frame">
		<form action="<?= @route('view=topics&category='.$category->id) ?>" method="get" name="search">
	    	<input name="search" type="text" placeholder="<?= @text('Search this category...') ?>">
	    	<input class="btn" type="submit" value="Search" disabled="disabled">
	    </form>
	</div>

	<div class="frame">
		<div class="content group">
		    <?= @template('default_items'); ?>
		</div>
	</div>

</div>