<div class="component-header">
	<?= @template('default_scopebar') ?>
</div>

<div style="padding: 20px;">
	<div class="row-fluid">
		<div class="span9">
			<div class="events">	
				<?= @template('default_agenda') ?>
				
				<?= @helper('com://site/news.template.helper.paginator.pagination', array('total' => $total, 'show_count' => false, 'show_limit' => false)) ?>
			</div>
		</div>
		<div class="span3">
			<? if($agent) : ?>
			<div class="articles-toolbar">
			    <a style="width: 90%;" class="btn btn-primary btn-small" href="<?= @route('view=event&layout=form') ?>">
			        <i class="icon-plus icon-white"></i> <?= @text('New') ?>
			    </a>
			</div>
			<? endif; ?>
		</div>
	</div>
</div>