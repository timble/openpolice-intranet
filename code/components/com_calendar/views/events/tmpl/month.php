<? $firstdate = date('Ym', strtotime($today)).'01' ?> 
<? $lastdate = date('Ymt', strtotime($today)) ?>

<? $firstweek = date('W', strtotime($firstdate)) ?> 
<? $lastweek = date('W', strtotime($lastdate)) ?>

<? $firstday = date('N', strtotime($firstdate)) ?> 
<? $lastday = date('N', strtotime($lastdate)) ?>

<? $weeks = $lastweek - $firstweek ?>

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
 
<table class="table">
	<thead>
	<tr>
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
 
<? $week = $firstweek ?>
<? while($week <= $lastweek) : ?>
<? $y = '1' ?>

<div class="row-fluid calendar-month">
	<table class="table">
		<tr>
			<? $dayTimes = getDaysInWeek($week, 2012); ?>
			<? $lastDayOfWeek = strftime('%d', end($dayTimes)); ?>
			<? foreach ($dayTimes as $dayTime) : ?>
				<? $y++ ?>
				<td style="width: 14.28%;">
					<?= strftime('%d', $dayTime); ?><br />
					
					<? foreach($days->find(array('day' => strftime('%d', $dayTime))) as $event) : ?>
						<? $class = date('d', strtotime($event->end_date)) == strftime('%d', $dayTime) ? 'last' : '' ?>
						<? $class .= date('d', strtotime($event->start_date)) == strftime('%d', $dayTime) ? 'first' : '' ?>
					
						<div class="<?= $class ?>"><?= $event->title ?></div>
					<? endforeach; ?>
				</td>
			<? endforeach; ?>
		</tr>
	</table>
</div>
<? $week++ ?>
<? endwhile; ?>

<module title="" position="scopebar">
	<?= @template('default_scopebar') ?>
</module>

<? if($agent) : ?>
<module title="<?= @text('') ?>" position="sidebar">
	<div class="articles-toolbar">
	    <a style="width: 90%;" class="btn btn-primary btn-small" href="<?= @route('view=event&layout=form') ?>">
	        <i class="icon-plus icon-white"></i> <?= @text('New') ?>
	    </a>
	</div>
</module>
<? endif ?>