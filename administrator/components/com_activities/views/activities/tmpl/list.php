<?php
/**
 * @version     $Id: list.php 1504 2012-02-22 00:19:37Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Activities
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

defined('KOOWA') or die('Restricted access') ?>

<style src="media://com_activities/css/activities-list.css" />

<div id="activities-list">
	<div style="margin-bottom: 15px;">
		<?= @template('default_filter') ?>
	</div>
	<?php if(count($activities)) : ?>
	
	    <?php foreach ($activities as $activity) : ?>
	       <?php $list[substr($activity->created_on, 0, 10)][] = $activity; ?>
	    <?php endforeach; ?>
	
	    <?php foreach($list as $date => $activities) : ?>
			<h4><?= @helper('date.humanize', array('date' => $date)) ?></h4>
			<div class="activities">
			    <?php foreach($activities as $activity) : ?>
				<div class="activity">
					<span class="icon icon-16-<?= $activity->action ?>"></span>
				    <?= @helper('com://admin/activities.template.helper.activity.message', array('row' => $activity)) ?>
					<span class="info">
						<small><?= $activity->package.' - '.$activity->name ?> | <?= date("H:i", strtotime($activity->created_on)) ?></small>
					</span>
				</div>
			    <?php endforeach ?>
			</div>
	    <?php endforeach ?>
	<?php endif; ?>
</div>