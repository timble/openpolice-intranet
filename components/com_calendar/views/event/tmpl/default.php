<div class="component-header">
	<div class="btn-toolbar" id="event-toolbar">
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
</div>

<div class="event-default" style="padding: 20px;">
	<div class="row-fluid">
		<div class="span9">
		<?= @text('From') ?> <strong><?= @helper('date.format', array('date' => $event->start_date)) ?></strong> <?= @text('till') ?></span> <strong><?= @helper('date.format', array('date' => $event->end_date)) ?></strong>
		
		<hr />
		
		<p>
			<?= $event->description ?>
		</p>
		
		<? if(count($attachments)): ?>
		<hr />
		
		<strong><?= @text('Attachments') ?></strong>
		<?= @template('com://site/calendar.view.attachments.list') ?>
		<? endif; ?>
		</div>
	</div>
</div>