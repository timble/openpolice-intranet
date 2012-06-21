<form action="" method="post" class="-koowa-form">
	<fieldset>
	    <div class="control-group">
	    	<h3><?= @text('Commentable') ?></h3>
	    	<div class="controls"><?= @helper('listbox.booleanlist', array('name' => 'commentable', 'selected' => $article->commentable)) ?></div>
	    </div>
    	<div class="actions">
    		<input class="btn btn-small" type="submit" value="<?= @text('Save') ?>" /> 
    	</div>
    </fieldset>
</form>