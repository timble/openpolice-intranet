<?= @helper('behavior.mootools') ?>
<?= @helper('behavior.modal') ?>

<!--
<script src="media://lib_koowa/js/koowa.js" />
-->

<? if($topic->answered): ?>
<div class="frame">
	<div class="frame__header">
	    <h2><?= @text('Answer') ?></h2>
	</div>
	<div class="content spacing">
		<?= @template('com://site/fora.view.comment.default', array('comment' => $comments->find(array('answer' => true))->current(), 'forum' => $forum)) ?>
	</div>
</div>
<? endif; ?>

<div class="frame">
	<div class="frame__header">
	    <h2><?= @text('Comments') ?></h2>
	</div>
	<div class="content spacing">
	<? foreach($comments as $comment) : ?>
		<?= @template('com://site/fora.view.comment.default', array('comment' => $comment, 'forum' => $forum))?>	
	<? endforeach ?>
	</div>
	
	<div class="content comments">
		<?= @template('default_form') ?>
	</div>
</div>