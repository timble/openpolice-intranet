<? @helper('behavior.mootools') ?>
<form action="" method="get" class="-koowa-form form-inline">		
	<div class="btn-toolbar">
		<div class="btn-group">
		    <a class="btn" href="<?= @route('date='.$today) ?>">
		    	<?= @text('Today') ?>
		    </a>
		</div>
		<div class="btn-group">
			<a class="btn" href="<?= @route('date='.date("Ymd", strtotime($state->date . " -1 month"))) ?>">
				<i class="icon-arrow-left"></i>
			</a>
			<a class="btn" href="<?= @route('date='.date("Ymd", strtotime($state->date . " +1 month"))) ?>">
				<i class="icon-arrow-right"></i>
			</a>
		</div>
		<div class="btn-group">
			<h3 style="float:right"><?= @helper('date.format', array('date' => strtotime($state->date), 'format' => '%B')) ?></h3>
		</div>
		<? if($agent) : ?>
		<div class="btn-group pull-right">
			<a class="btn btn-primary btn-small" href="<?= @route('view=event&layout=form') ?>">
				<i class="icon-plus icon-white"></i>
			</a>
		</div>
		<? endif; ?>
		<div class="btn-group pull-right">
			<a class="btn <?= JRequest::getVar('layout', 'default') == 'default' ? 'active' : '' ?>" href="<?= @route('&layout=default') ?>">
				<?= @text('Agenda') ?>
			</a>
			<a class="btn <?= JRequest::getVar('layout', 'default') == 'month' ? 'active' : '' ?>" href="<?= @route('&layout=month') ?>">
				<?= @text('Month') ?>
			</a>
		</div>
	</div>
</form>
