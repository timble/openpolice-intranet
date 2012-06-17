<form action="" method="post" class="-koowa-form">
	<fieldset>
	    <div class="control-group">
	    	<label class="control-label"><?= @text('Commentable') ?></label>
	    	<div class="controls"><?= @helper('listbox.booleanlist', array('name' => 'commentable', 'selected' => $article->commentable)) ?></div>
	    </div>
    	<div class="actions">
    		<input class="btn btn-small" type="submit" value="<?= @text('Save') ?>" /> 
    	</div>
    </fieldset>
</form>