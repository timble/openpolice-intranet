<?= @helper('behavior.mootools') ?>

<!--
<script src="media://lib_koowa/js/koowa.js" />
-->

<a name="comments"></a>

<? foreach($comments as $comment) : ?>
	<?= @template('com://site/news.view.comment.default', array('comment' => $comment))?>	
<? endforeach ?>