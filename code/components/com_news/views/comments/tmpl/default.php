<?= @helper('behavior.mootools') ?>

<!--
<script src="media://lib_koowa/js/koowa.js" />
-->

<div id="comments-comments-default" class="comments">     
    <? foreach($comments as $comment) : ?>
        <a id="comment-<?= $comment->id ?>" name="comment-<?= $comment->id ?>"></a>
        <div class="comment separator group">        	
            <? if ($comment->created_by == $user->id || $agent) : ?>
                <form action="<?= @route('view=comment&id='.$comment->id) ?>" method="post" class="-koowa-form">
                    <input type="hidden" name="action" value="save" />
                    <?
                        $controller = @service('com://admin/editors.controller.editor');
                        $controller->getView()->setEditorSettings($editor_settings);
                        echo $controller->name('text')->id('comment'.$comment->id)->data($comment->text)->toggle(true)->codemirror(false)->display();
                    ?>
                </form>
            <? else : ?>
                <?= $comment->text ?>
            <? endif ?>
            <?= @template('com://site/fora.view.attachments.default', array('row' => $comment->id, 'table' => 'comments_comments')); ?>
            <div class="footer">
            	<?= @text('Posted') ?> <a href="<?= @route('view=article&id='.$article->id.'&slug='.$article->slug) ?>#comment-<?= $comment->id ?>"><?= @helper('date.humanize', array('date' => $comment->created_on)) ?></a> 
            	<?= @text('by') ?> <strong><?= @escape($comment->created_by_name) ?></strong>
            	<? if ($agent) : ?>
            	    <form style="float: right;" action="<?= @route('view=comment&id='.$comment->id) ?>" method="post" class="-koowa-form">
            	        <input type="hidden" name="action" value="delete" />
            	        <input class="btn btn-mini" type="submit" value="<?= @text('Delete') ?>" />
            	    </form>
            	<? endif ?>
            </div>
        </div>
    <? endforeach ?>
</div>