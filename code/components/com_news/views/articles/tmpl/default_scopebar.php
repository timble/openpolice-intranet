<? @helper('behavior.mootools') ?>

<div style="float: left;">
	<div class="btn-group">
	    <a class="btn<?= $state->subscribed ? ' active' : '' ?>" href="<?= @route('&subscribed=1&category=') ?>"><i class="icon-star"></i> <?= @text('My Articles') ?></a>
	    <a class="btn<?= $state->category == null && !$state->subscribed ? ' active' : '' ?>" href="<?= @route('&subscribed=&category=') ?>"><?= @text('All') ?></a>
	    <? foreach(@service('com://site/news.model.categories')->sort('title')->getList() as $category): ?>
	        <a class="btn<?= $state->category == $category->id ? ' active' : '' ?>" href="<?= @route('&subscribed=&category='.$category->id) ?>"><?= $category->title ?></a>
	    <? endforeach ?>
	</div>
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
