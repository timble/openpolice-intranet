<div class="events">	
	<?= @template('default_agenda') ?>
</div>

<? if($agent) : ?>
<module title="<?= @text('') ?>" position="sidebar">
	<div class="articles-toolbar">
	    <a style="width: 90%;" class="btn btn-primary btn-small" href="<?= @route('view=event&layout=form') ?>">
	        <i class="icon-plus icon-white"></i> <?= @text('New') ?>
	    </a>
	</div>
</module>
<? endif ?>