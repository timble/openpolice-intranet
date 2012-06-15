
<h1><?= $event->title ?></h1>

<div>
	<?= @text('From') ?> 
	<strong><?= @helper('date.format', array('format' => '%d %m %Y %H:%M', 'date' => $event->start_date))?></strong>
	<?= @text('until') ?> 
	<strong><?= @helper('date.format', array('format' => '%d %m %Y %H:%M', 'date' => $event->end_date))?></strong>
</div>

<p>
<?= $event->description ?>
</p>