<?php defined('KOOWA') or die( 'Restricted access' ); ?>

<div class="scopebar btn-toolbar">
	<div class="btn-group">
		<a class="btn btn-small<?= !is_numeric($state->category) ? ' active' : ''; ?>" href="<?= @route('category=' ) ?>">
		    <?= @text('All forums') ?>
		</a>
	</div>
	<div class="btn-group">
		<? foreach(@service('com://site/fora.model.categories')->set('ordering', 'name')->getList() as $category): ?>
		<a class="btn btn-small<?= $state->category == $category->id ? ' active' : ''; ?>" href="<?= @route('category='.$category->id ) ?>">
		    <?= @escape($category->title) ?>
		</a>
		<? endforeach; ?>
	</div>
</div>
