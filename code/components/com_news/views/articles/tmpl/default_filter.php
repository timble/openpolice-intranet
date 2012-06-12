<module title="" position="scopebar">
	<div style="float: left;">
		<?= @template('com://site/news.view.categories.list', array('categories' => @service('com://site/news.model.categories')->getList()))?>
	</div>
	<form style="float: right;" action="" method="get" class="-koowa-form form-inline">			
		<label><?= @text('From') ?></label>
		<?= @helper('behavior.calendar',
				array(
					'date' => $state->start_date,
					'name' => 'start_date',
					'format' => '%d-%m-%Y',
					'attribs' => array('style' => 'width: 70px')
				)); ?>
		<label><?=@text( 'till' )?></label>
		<?= @helper('behavior.calendar',
				array(
					'date' => $state->end_date,
					'name' => 'end_date',
					'format' => '%d-%m-%Y',
					'attribs' => array('style' => 'width: 70px')
				)); ?>				
		<input class="btn btn-mini" type="submit" value="<?= @text('Go') ?>" /> <?=@text( 'or' )?>
		<a href="<?= @route('&start_date=&end_date=') ?>">
		   Reset
		</a>
	</form>
</module>