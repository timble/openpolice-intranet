<?= @helper('behavior.mootools') ?>

<script src="media://com_fora/js/search.js" />

<script>
    window.addEvent('domready', (function() {
        var form = document.getElement('#fora-categories-default form[name=search]');
        
        new Fora.Search({
            text: form.getElement('input[name=search]'),
            button: form.getElement('input[type=submit]')
        });
    }));
</script>

<div class="frame">
	<form action="<?= @route('view=topics') ?>" method="get" name="search">
    	<input name="search" type="text" placeholder="<?= @text('Search all categories...') ?>" value="<?= $state->search ? @escape($state->search) : null ?>">
    	<input class="btn primary" type="submit" value="Search" disabled="disabled">
    </form>
</div>

<div class="frame">
	<div class="frame__header group">
		<h1 style="float: left"><?= @text('Activity stream') ?></h1>
	</div>
	<div class="content activities">
		<?= @template('default_scopebar'); ?>
		<div class="spacing">
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
				<tr class="<?= $activity->fora_topic_id ? 'active' : 'deleted' ?> <?= ($date != $old_date) ? 'new-day' : '' ?>">
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
			        	
			        	<? if($activity->fora_topic_id): ?>
			        		<div class="route">
			    				<a href="<?= @route('view=category&id='.$activity->fora_category_id.'&slug='.$activity->category_slug) ?>"><?= $activity->category_title ?></a> &raquo;
			    				<a href="<?= @route('view=forum&id='.$activity->fora_forum_id.'&slug='.$activity->forum_slug) ?>"><?= $activity->forum_title ?></a>
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
		</div>
		
	</div>
	<?= @helper('com://site/tickets.template.helper.paginator.pagination', array('total' => $total, 'show_count' => false, 'show_limit' => false)) ?>
</div>