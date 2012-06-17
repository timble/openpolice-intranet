<div class="article-text">
	
	<?= @helper('com://site/news.template.helper.article.text', array('row' => $article)); ?>
</div>

<? if(isset($attachments)): ?>
<div class="article-attachments">
	<?= @template('com://site/news.view.attachments.default') ?>
</div>
<? endif; ?>
