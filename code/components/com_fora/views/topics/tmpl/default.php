<?= @helper('behavior.mootools') ?>
<script src="media://com_fora/js/search.js" />

<script>
    window.addEvent('domready', (function() {
        var form = document.getElement('#fora-topics-default form[name=search]');
        
        new Fora.Search({
            text: form.getElement('input[name=search]'),
            button: form.getElement('input[type=submit]')
        });
    }));
</script>

<div id="fora-topics-default">
	<div class="frame">
		<form action="" method="get" name="search">
	    	<input name="search" type="text" placeholder="<?= @text('Search this forum...') ?>" value="<?= $state->search ? @escape($state->search) : null ?>">
	    	<input class="btn primary" type="submit" value="Search" disabled="disabled">
	    </form>
	</div>
	
	<div class="frame">
	    <? if(!$state->search) : ?>
	    <div class="frame__header group">
	        <h1 style="float: left"><?= @escape($forum->title) ?></h1>
	        <div class="btn-group" style="float: right">
	        <? if($forum->open || $agent) : ?>
	            <a class="btn btn-primary btn-small" href="<?= @route('view=topic&layout=form&forum='.$forum->id) ?>">
	                <?= @text('New').' '.@text($forum->type) ?>
	            </a>
	        <? endif ?>
	        <? if($forum->subscribable || $agent) : ?>
	            <?= @template('default_subscribe') ?>
	        <? endif ?>
	        </div>
	    </div>
	    <? endif ?>
	  
	    
	    <div class="content topics spacing">
	    <? foreach($topics as $topic) : ?>
	        <?= @template('default_items', array('topic' => $topic)); ?>
	    <? endforeach ?>
	    
	    <? if(!$total) : ?>
	    	<p><?= @text('Your search') ?> - <strong><?= $state->search ?></strong> - <?= @text('did not match anything inside our forums') ?>.</p>
	    	
	    	<p><?= @text('Suggestions') ?>:</p>
	    	<ul>
	    	<li><?= @text('Make sure all words are spelled correctly') ?>;</li>
	    	<li><?= @text('Try different keywords') ?>;</li>
	    	<li><?= @text('Try more generic keywords') ?>.</li>
	    	</ul>
	    <? endif; ?>
	    
	    </div>
	    <?= @helper('com://site/tickets.template.helper.paginator.pagination', array('total' => $total, 'show_count' => false, 'show_limit' => false)) ?>
	</div>
	
</div>

<? if($state->forum) : ?>
    <module title="<?= @escape($forum->title) ?>" position="right3"><?= $forum->description ?></module>
<? endif ?>