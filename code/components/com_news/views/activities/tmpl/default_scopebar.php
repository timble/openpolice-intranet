<?php defined('KOOWA') or die( 'Restricted access' ); ?>

<div class="btn-group">
	<a class="btn<?= $state->subscribed ? ' active' : '' ?>" href="<?= @route('&subscribed=1&category=') ?>"><i class="icon-star"></i> <?= @text('My Articles') ?></a>
	<a class="btn<?= !is_numeric($state->category) && !$state->subscribed ? ' active' : ''; ?>" href="<?= @route('&subscribed=&category=' ) ?>">
	    <?= @text('All') ?>
	</a>
	<? foreach(@service('com://site/news.model.categories')->sort('title')->getList() as $category): ?>
	<a class="btn<?= $state->category == $category->id ? ' active' : ''; ?>" href="<?= @route('&subscribed=&category='.$category->id ) ?>">
	    <?= @escape($category->title) ?>
	</a>
	<? endforeach; ?>
</div>