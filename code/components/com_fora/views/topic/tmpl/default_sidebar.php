
<form action="" method="post" class="-koowa-form">
	<fieldset>
	    <div class="control-group">
	    	<label class="control-label"><?= @text('Commentable') ?></label>
	    	<div class="controls"><?= @helper('listbox.booleanlist', array('name' => 'commentable', 'selected' => $topic->commentable)) ?></div>
	    </div>
    	<? if($forum->type == 'idea') : ?>
    	<div class="control-group">
    		<label class="control-label"><?= @text('Status') ?></label>
    		<div class="controls"><?= @helper('listbox.statuses', array('selected' => $topic->status)) ?></div>
    	</div>
    	<? endif ?>
    	<div class="actions">
    		<input class="btn" type="submit" value="<?= @text('Save') ?>" /> 
    	</div>
    </fieldset>
</form>