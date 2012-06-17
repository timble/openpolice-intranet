<table class="table table-striped">
	<thead>
		<th width="15%">Date</th>
		<th width="15%">Time</th>
		<th width="70%">Event</th>
	</thead>
	<tbody>
		<? foreach($events as $event) : ?>
		<tr>
			<td><?= @helper('date.format', array('date' => $event->start_date, 'format' => '%d %b')) ?></td>
			<td><?= @helper('date.format', array('date' => $event->start_date, 'format' => '%H:%M')) ?></td>
			<td>
				<a href="<?= @route('view=event&id='.$event->id) ?>"><?= $event->title ?></a>
			</td>
		</tr>
		<? endforeach ?>
	</tbody>
</table>
