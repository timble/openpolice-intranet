<module title="" position="scopebar">
	<div style="float: left;">
		<?= @template('com://site/news.view.categories.list', array('categories' => @service('com://site/news.model.categories')->getList()))?>
	</div>
	<form style="float: right;" action="" method="get" class="-koowa-form form-inline">			
		<div class="input-prepend input-append">
		<span class="add-on"><?=@text( 'From' )?></span><?= @helper('behavior.calendar',
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
	</form>
</module>