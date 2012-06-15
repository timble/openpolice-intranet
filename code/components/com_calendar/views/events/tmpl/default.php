<div class="events">	
	<?= @template('default_agenda') ?>
	
	<?= @helper('com://site/news.template.helper.paginator.pagination', array('total' => $total, 'show_count' => false, 'show_limit' => false)) ?>
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