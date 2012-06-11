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
		<div class="input-append">
			<input type="text" style="width: 20px;" name="days_back" value="<?=($state->days_back) ? $state->days_back : '' ?>" /><span class="add-on"><?=@text( 'days back' )?></span>
		</div>
		
		<input class="btn btn-primary" type="submit" value="<?= @text('Go') ?>" /> <?=@text( 'or' )?>
		<a href="<?= @route('view=articles') ?>">
		   Reset
		</a>
	</form>
</module>