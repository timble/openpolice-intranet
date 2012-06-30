<div class="component-header">
	<?= @template('default_scopebar') ?>
</div>

<div style="padding: 20px;">
	<div class="events">	
		<table class="table table-striped">
			<thead>
				<th width="15%">Date</th>
				<th width="15%">Time</th>
				<th width="70%">Event</th>
			</thead>
			<tbody>
				<? $count = '0' ?>
				<? $current_day = null; ?>
				<? while($count != cal_days_in_month(CAL_GREGORIAN, date('m', strtotime($state->date)), date('Y', strtotime($state->date)))) : ?>
					<? $count++ ?>
		
					<? $list = $days->find(array('day' => $count)) ?>
		
					<? foreach($list as $event) : ?>
					<tr>
						<td>
							<? if($current_day != $count) : ?>
								<? $current_day = $count; ?>
								<?= $count ?> <?= date('M', strtotime($state->date)) ?>
							<? endif; ?>	
						</td>
						<td>
						<? if($event->hour || $event->minute) : ?>
							<?= @helper('date.format', array('date' => $event->date, 'format' => '%H:%M')) ?>
						<? else : ?>
							<?= @text('All day') ?>
						<? endif ?>
						</td>
						<td>				
							<a href="<?= @route('view=event&id='.$event->calendar_event_id) ?>"><?= $event->title ?></a>
						</td>
					</tr>
					<? endforeach ?>
				<? endwhile; ?>
			</tbody>
		</table>
		<?= @helper('com://site/news.template.helper.paginator.pagination', array('total' => $total, 'show_count' => false, 'show_limit' => false)) ?>
	</div>
</div>