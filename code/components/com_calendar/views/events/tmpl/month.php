<div class="component-header">
	<?= @template('default_scopebar', array('date' => $state->date)) ?>
</div>

<? $firstdate = date('Ym', strtotime($state->date)).'01' ?> 
<? $lastdate = date('Ymt', strtotime($state->date)) ?>

<? $firstweek = date('W', strtotime($firstdate)) ?> 
<? $lastweek = date('W', strtotime($lastdate)) ?>

<? $firstday = date('N', strtotime($firstdate)) ?> 
<? $lastday = date('N', strtotime($lastdate)) ?>

<? $weeks = $lastweek - $firstweek ?>

<? //@service('lib.koowa.date', array('date' => $state->date))->getDaysInMonth() ?>

<? 
function getDaysInWeek ($weekNumber, $year) {
  // Count from '0104' because January 4th is always in week 1
  // (according to ISO 8601).
  $time = strtotime($year . '0104 +' . ($weekNumber - 1)
                    . ' weeks');
  // Get the time of the first day of the week
  $mondayTime = strtotime('-' . (date('w', $time) - 1) . ' days',
                          $time);
  // Get the times of days 0 -> 6
  $dayTimes = array ();
  for ($i = 0; $i < 7; ++$i) {
    $dayTimes[] = strtotime('+' . $i . ' days', $mondayTime);
  }
  // Return timestamps for mon-sun.
  return $dayTimes;
}

 ?>
 
 <div class="calendar-month" style="padding: 20px;"> 
	<table class="table first">
		<thead>
		<tr>
			<th style="width: 20px;">#</th>
			<th style="width: 14.28%;"><?= @text('Mon') ?></th>
			<th style="width: 14.28%;"><?= @text('Tue') ?></th>
			<th style="width: 14.28%;"><?= @text('Wed') ?></th>
			<th style="width: 14.28%;"><?= @text('Thu') ?></th>
			<th style="width: 14.28%;"><?= @text('Fri') ?></th>
			<th style="width: 14.28%;"><?= @text('Sat') ?></th>
			<th style="width: 14.28%;"><?= @text('Sun') ?></th>
		</tr>
		</thead>
	</table>
	 
	<? $week_count = $firstweek ?>
	<? while($week_count <= $lastweek) : ?>
	<? $dayTimes = getDaysInWeek($week_count, 2012); ?>
	<? $lastDayOfWeek = strftime('%d', end($dayTimes)); ?>
	<? $firstDayOfWeek = strftime('%d', $dayTimes[0]); ?>
	<div class="row-fluid">
		<table class="table">
			<tr class="days">
				<td class="weeknumber" style="width: 20px;"><span class="label"><?= $week_count ?></label></td>
				<? foreach ($dayTimes as $dayTime) : ?>
				<td style="width: 14.28%;" <?= strftime('%Y%m%d', $dayTime) == $today ? 'class="today"' : ''; ?>>
					<div class="calendar-day"><?= strftime('%d', $dayTime); ?></div>
				</td>
				<? endforeach; ?>
			</tr>
			<? $level_count = '1' ?>
			<? $level = '2' ?>
			<? while($level_count <= $level) : ?>
			<tr>
				<td style="width: 20px;"></td>
				<? foreach ($dayTimes as $dayTime) : ?>
				<td style="width: 14.28%;" <?= strftime('%Y%m%d', $dayTime) == $today ? 'class="today"' : ''; ?>>
									
					<? foreach($days->find(array('day' => strftime('%d', $dayTime), 'level' => $level_count)) as $event) : ?>
						<? $class = date('d', strtotime($event->end_date)) == strftime('%d', $dayTime) ? ' last' : '' ?>
						<? $class .= date('d', strtotime($event->start_date)) == strftime('%d', $dayTime) ? ' first' : '' ?>
						
						<? if(date('d', strtotime($event->start_date)) == strftime('%d', $dayTime) OR strftime('%d', $dayTime) == $firstDayOfWeek) : ?>
						<div class="calendar-event<?= $class ?>">
							<a href="<?= @route('view=event&id='.$event->calendar_event_id) ?>"><?= $event->title ?></a>
						</div>
						<? else : ?>
						<div class="calendar-event<?= $class ?>"></div>
						<? endif; ?>
					<? endforeach; ?>
				</td>
				<? endforeach; ?>
			</tr>
			<? $level_count++ ?>
			<? endwhile; ?>
		</table>
	</div>
	<? $week_count++ ?>
	<? endwhile; ?>
</div>

<module title="" position="scopebar">
	<?= @template('default_scopebar') ?>
</module>