<?php defined('KOOWA') or die( 'Restricted access' ); ?>

<div class="btn-group">
	<a class="btn<?= !is_numeric($state->category) ? ' active' : ''; ?>" href="<?= @route('category=' ) ?>">
	    <?= @text('All') ?>
	</a>
	<? foreach(@service('com://site/news.model.categories')->sort('title')->getList() as $category): ?>
	<a class="btn<?= $state->category == $category->id ? ' active' : ''; ?>" href="<?= @route('category='.$category->id ) ?>">
	    <?= @escape($category->title) ?>
	</a>
	<? endforeach; ?>
</div>