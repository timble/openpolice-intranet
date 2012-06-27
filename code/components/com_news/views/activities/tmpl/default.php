<?= @helper('behavior.mootools') ?>

<div class="component-header">
	<?= @template('default_scopebar'); ?>
</div>
<div style="padding: 20px;">
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
		        	<?= @helper('activity.message', array('row' => $activity)) ?> <? if($activity->news_category_id): ?><span class="label label-<?= json_decode($activity->category_params)->color ?> pull-right"><?= $activity->category_title ?></span><? endif; ?>	
		        	
		        	<? if($activity->text && $activity->action == 'add' && in_array($activity->name, array('topic', 'comment'))): ?> 
		        		<div class="well">
		        		<?= @helper('activity.summary', array('text' => $activity->text)) ?>
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
</div>

<module title="" position="syndicate">
	<a class="btn btn-mini btn-warning" target="_blank" href="<?= @route('&format=rss') ?>"><i class="icon-envelope icon-white"></i> RSS</a>
</module>
