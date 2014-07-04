<? @helper('behavior.mootools') ?>
<form action="" method="get" class="-koowa-form form-inline">		
	<div class="btn-toolbar">
		<div class="btn-group">
		    <a class="btn<?= !$state->category && !$state->subscribed ? ' active' : '' ?>" href="<?= @route('&category=&subscribed=') ?>"><?= @text('All') ?></a>
		</div>
		<div class="btn-group">
		    <? foreach(@service('com://site/news.model.categories')->sort('title')->getList() as $category): ?>
		    	<? if($state->category == $category->id) : ?>
		    		<a class="btn active" href="<?= @route('&category=') ?>"><?= $category->title ?></a>
		    	<? else : ?>
		    		<a class="btn" href="<?= @route('&category='.$category->id) ?>"><?= $category->title ?></a>
		    	<? endif; ?>
		        
		    <? endforeach ?>
		</div>
		<div class="btn-group">
			<a class="btn<?= $state->subscribed ? ' active' : '' ?>" href="<?= @route($state->subscribed ? '&subscribed=' : '&subscribed=1') ?>"><i class="icon-star"></i></a>
		</div>
		<div class="date-group input-prepend input-append pull-right">
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
