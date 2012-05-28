<?= @helper('behavior.mootools') ?>

<!--
<script src="media://lib_koowa/js/koowa.js" />
-->

<div id="comments-comments-default" class="comments">     
    <? foreach($comments as $comment) : ?>
        <a id="comment-<?= $comment->id ?>" name="comment-<?= $comment->id ?>"></a>
        <div id="comment-<?= $comment->id ?>-details" class="comment separator group<?= $comment->answer ? ' answer' : '' ?>">
            <div style="float:left">
            <?= @helper('com://admin/comments.template.helper.grid.gravatar', array('email' => $comment->created_by_email, 'size' => '32')) ?>
            </div>
        	
            <div style="float:left;width:585px">
                <? if($forum->type == 'question' && $comment->answer) :  ?>
                    <span style="float: right;margin-left:12px;margin-bottom:4px;" class="label label-success"><?= @text('Answer') ?></span>
                <? endif ?>
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
                	<?= @text('Posted') ?> <a href="<?= @route('view=topic&id='.$topic->id.'&slug='.$topic->slug) ?>#comment-<?= $comment->id ?>"><?= @helper('date.humanize', array('date' => $comment->created_on)) ?></a> 
                	<?= @text('by') ?> <strong><?= @escape($comment->created_by_name) ?></strong>
                	<? if ($agent) : ?>
                	    <form style="float: right;" action="<?= @route('view=comment&id='.$comment->id) ?>" method="post" class="-koowa-form">
                	        <input type="hidden" name="action" value="delete" />
                	        <input class="btn btn-mini" type="submit" value="<?= @text('Delete') ?>" />
                	    </form>
                	<? endif ?>
                	<? if($agent && $forum->type == 'question' && !$comment->answer) : ?>
                	    <form style="float: right;" action="<?= @route('view=comment&table=fora_topics&row='.$state->row.'&id='.$comment->id) ?>" method="post" class="-koowa-form">
                	        <input type="hidden" name="action" value="save" />
                	        <input type="hidden" name="answer" value="1" />
                	        <input class="btn btn-mini" type="submit" value="<?= @text('Mark as answer') ?>" />
                	    </form>
                	<? endif ?>
                </div>
            </div>
        </div>
    <? endforeach ?>
</div>