<p>
<?= $event->description ?>
</p>

<module title="" position="scopebar">
	<? if(JFactory::getUser()->id): ?>
	<div class="btn-toolbar" id="event-toolbar">
		<div class="date">
			<?= @helper('date.format', array('date' => $event->start_date, 'format' => '%H:%M')) ?><br />
			<?= @helper('date.format', array('date' => $event->start_date, 'format' => '%d %b')) ?>
		</div>
		<h1><?= $event->title ?> <small><?= @text('by') ?> <a href="mailto:<?= $event->created_by_email ?>"><?= @escape($event->created_by_name) ?></a></small></h1>
		<div class="btn-group pull-right" style="margin-left: 8px;">
			<span class="btn btn-small btn-warning disabled"><i class="icon-white icon-<?= $subscribed ? 'star' : 'star-empty' ?>"></i></a>
		</div>
		<div class="btn-group pull-right">
			<? if($agent): ?>	
		    	<a class="btn btn-small edit" href="<?= @route('layout=form&id='.$event->id) ?>"><i class="icon-pencil"></i></a>
		    	<a class="btn btn-small delete" href="#"><i class="icon-trash"></i></a>
		    <? endif; ?>
		</div>
	</div>
	<? endif ?>
</module>