<?= @helper('behavior.mootools') ?>

<module title="" position="scopebar">
	<?= @template('default_scopebar'); ?>
</module>

<table class="table" width="100%">
	<thead>
		<tr>
			<th><?=@text('Day')?></th>
			<th><?=@text('Time')?></th>
			<th width="32"></th>
			<th><?=@text('Message')?></th>
		</tr>
	</thead>
	<tbody>
	<? $old_date = null; ?>
	<? foreach($activities as $activity): ?>
		<? $date = @date(array('date' => $activity->created_on, 'format' => '%d %b'))?>
		<tr class="<?= $activity->news_article_id ? 'active' : 'deleted' ?> <?= ($date != $old_date) ? 'new-day' : '' ?>">
			<? if ($date != $old_date): ?>
	        <? $old_date = $date; ?>
		        <td nowrap="nowrap">
					<?= $date; ?>
				</td>
			<? else: ?>
				<td></td>
	        <? endif; ?>
	        <td nowrap="nowrap">
	        	<?= @helper('date.humanize', array('date' => $activity->created_on)) ?>
	        </td>
	        <td>
			    <div class="label label-<?= $activity->name ?>">
			    	<?= $activity->name ?>
			    </div>
	        </td>
	        <td>
	        	<?= @helper('activity.message', array('row' => $activity)) ?> 
	        	
	        	<? if($activity->text && $activity->action == 'add' && in_array($activity->name, array('topic', 'comment'))): ?> 
	        		<div class="well">
	        		<?= @helper('activity.summary', array('text' => $activity->text)) ?>
	        		</div>
	        	<? endif; ?>
	        	
	        	<? if($activity->news_category_id): ?>
	        		<div class="route">
	    				<a href="<?= @route('view=category&id='.$activity->news_category_id.'&slug='.$activity->category_slug) ?>"><?= $activity->category_title ?></a>
	    			</div>
	        	<? endif; ?>			       		
	        </td>
		</tr>
	<? endforeach; ?>
	
    <? if(!$total) : ?>
    	<tr>
    		<td colspan="4">
    			<p><?= @text('No activities found') ?>.</p>
    		</td>
    	</tr>
    <? endif; ?>
	</tbody>
</table>

<?= @helper('paginator.pagination', array('total' => $total, 'show_count' => false, 'show_limit' => false)) ?>
