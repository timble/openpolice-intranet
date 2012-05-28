
<script> 
window.addEvent('domready', function() {
	var selectedIndex = 0;
	var selected = $$('input[type=radio][name=fora_forum_id]:checked')[0];

	if(selected) {
		var parent = selected.getParent('div.forums');
		$$('div.forums').each(function(el, i) {
			if(el === parent) {
				selectedIndex = i;
			}
		});
	}

	new Fx.Accordion('h4.category', 'div.forums', {show: selectedIndex});
});
</script>

<? foreach($categories as $category) : ?>
	<h4 class="category"><?= @escape($category->title); ?></h4><br />
	<div class="forums">
	<?= @helper('listbox.radiolist', array(
			'list'     => $forums->find(array('fora_category_id' => $category->id)),
			'selected' => $topic->fora_forum_id,
			'name'     => 'fora_forum_id',
	        'text'     => 'title'
		));
	?>
	</div>
<? endforeach ?>
