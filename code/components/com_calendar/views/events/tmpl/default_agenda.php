<table class="table table-striped">
	<thead>
		<th width="10%">Date</th>
		<th width="10%">Time</th>
		<th width="80%">Event</th>
	</thead>
	<tbody>
		<? foreach($events as $event) : ?>
		<tr>
			<td><?= @helper('date.format', array('date' => $event->start_date, 'format' => '%d %b')) ?></td>
			<td><?= @helper('date.format', array('date' => $event->start_date, 'format' => '%H:%M')) ?></td>
			<td><?= $event->title ?>
				<div style="float: right;">
					<a class="btn  btn-mini" href="<?= @route('view=event&layout=form&id='.$event->id) ?>"><i class="icon-pencil"></i> <?= @text('Edit') ?></a>
				</div>
			</td>
		</tr>
		<? endforeach ?>
	</tbody>
</table>
