<?php defined('KOOWA') or die( 'Restricted access' ); ?>

<div class="btn-group">
	<a class="btn btn-small<?= !is_numeric($state->category) ? ' active' : ''; ?>" href="<?= @route('category=' ) ?>">
	    <?= @text('All') ?>
	</a>
	<? foreach(@service('com://site/news.model.categories')->sort('title')->getList() as $category): ?>
	<a class="btn btn-small<?= $state->category == $category->id ? ' active' : ''; ?>" href="<?= @route('category='.$category->id ) ?>">
	    <?= @escape($category->title) ?>
	</a>
	<? endforeach; ?>
</div>