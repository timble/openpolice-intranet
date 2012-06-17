<?php defined('KOOWA') or die( 'Restricted access' ); ?>

<div class="btn-toolbar">
	<div class="btn-group">
		<a class="btn<?= !is_numeric($state->category) && !$state->subscribed ? ' active' : ''; ?>" href="<?= @route('&subscribed=&category=' ) ?>">
		    <?= @text('All') ?>
		</a>
	</div>
	<div class="btn-group">
		<a class="btn<?= $state->subscribed ? ' active' : '' ?>" href="<?= @route($state->subscribed ? '&subscribed=' : '&subscribed=1') ?>"><i class="icon-<?= $state->subscribed ? 'star' : 'star-empty' ?>"></i></a>
	</div>
	<div class="btn-group">
		<span class="btn">Calendar</span>
		<span class="btn active">News</span>
	</div>
</div>