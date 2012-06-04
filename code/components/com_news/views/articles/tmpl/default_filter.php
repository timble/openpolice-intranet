<module title="Filter" position="right">
	<?= @template('com://site/news.view.categories.list', array('categories' => @service('com://site/news.model.categories')->getList()))?>
	<div class="filter-date">
		<form action="" method="get" class="-koowa-form">
			<fieldset>
				<legend><?= @text('Date') ?></legend>	
				<div class="control-group">
					<div class="control-label"><label><?= @text('Show articles from') ?></label></div>
					<div class="controls">
						<?= @helper('behavior.calendar',
								array(
									'date' => $state->start_date,
									'name' => 'start_date',
									'format' => '%Y-%m-%d'
								)); ?>
					</div>
				</div>
				<div class="control-group">
					<div class="control-label"><label><?=@text( 'Going' )?></label></div>
					<div class="controls">
						<div class="input-append">
						<input type="text" size="3" name="days_back" value="<?=($state->days_back) ? $state->days_back : '' ?>" /><span class="add-on"><?=@text( 'days back' )?></span>
						</div>
					</div>
				</div>
				
			</fieldset>
		</form>
	</div>
	<div class="form-actions" style="margin: 0;">
		<input class="btn btn-primary" type="submit" value="<?= @text('Go') ?>" /> <?=@text( 'or' )?>
		<a href="<?= @route('view=articles') ?>">
		   Reset
		</a>
	</div>
</module>