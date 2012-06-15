<div class="events">
	<? if($agent) : ?>
	<div class="events-toolbar">
	    <a class="btn btn-primary btn-small" href="<?= @route('view=event&layout=form&category='.$state->category) ?>">
	        <i class="icon-plus icon-white"></i> <?= @text('New') ?>
	    </a>
	</div>
	<? endif ?>
	
	<?= @template('default_agenda') ?>
</div>