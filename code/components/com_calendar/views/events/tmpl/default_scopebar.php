<? @helper('behavior.mootools') ?>
<form action="" method="get" class="-koowa-form form-inline">		
	<div class="btn-toolbar">
		<div class="btn-group">
		    <span class="btn active"><?= @text('All') ?></span>
		</div>
		<div style="float: right;" class="input-prepend input-append date-group">
			<?= @helper('behavior.calendar',
			array(
				'date' => $state->start_date,
				'name' => 'start_date',
				'format' => '%d-%m-%Y',
				'attribs' => array('style' => 'width: 70px')
			)); ?><span class="add-on"><?=@text( 'till' )?></span><?= @helper('behavior.calendar',
			array(
				'date' => $state->end_date,
				'name' => 'end_date',
				'format' => '%d-%m-%Y',
				'attribs' => array('style' => 'width: 70px')
			)); ?><input class="btn" type="submit" value="<?= @text('Go') ?>" /><a class="btn" href="<?= @route('&start_date=&end_date=') ?>">
			   <i class="icon-remove"></i>
			</a>
		</div>
	</div>
</form>
