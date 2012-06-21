<div class="article-text">
	<?= $article->text ?>
</div>

<? if(isset($attachments)): ?>
<div class="article-attachments">
	<?= @template('com://site/news.view.attachments.default') ?>
</div>
<? endif; ?>
