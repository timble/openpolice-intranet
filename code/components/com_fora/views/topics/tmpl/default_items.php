<div class="topic separator">
    <div class="icon">
    	<img src="media://com_fora/images/<?= $topic->forum_type ?>.png" title="<?= $topic->forum_type ?>">
    	<div class="vote"><img src="media://com_fora/images/thumbs-up-small.png" title="Thumbs up"> <?= $topic->votes ?></div>
    </div>
    <div class="info">
	    <h3>
	        <a href="<?= @route('view=topic&id='.$topic->id.'&slug='.$topic->slug) ?>">
	            <?= @escape($topic->title) ?>
	        </a>
	        <? if($topic->answered) : ?>
	        	<span class="label label-success" style="float: right;"><?= @text('Answered') ?></span>
	        <? endif ?>
	    </h3>
	    <p class="gray"><?= @text('Created') ?> <?= @helper('date.humanize', array('date' => $topic->created_on)) ?> <?= @text('by') ?> <?= @escape($topic->created_by_name) ?> <?= $topic->last_commented_on ? '• '.@text('Latest comment about').' '.@helper('date.humanize', array('date' => $topic->last_commented_on)) : '' ?> <?= $topic->total_comments ? '• '.$topic->total_comments.' '.@text('Comments') : '' ?></p>
	    <p><a href="<?= @route('view=topic&id='.$topic->id.'&slug='.$topic->slug) ?>"><?= @text('View this').' '.$topic->forum_type ?> &rarr;</a></p>
    </div>
</div>