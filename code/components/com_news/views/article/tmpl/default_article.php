<div class="article-header <?= $article->category_slug ?>">
	<div class="date">
		<?= @helper('date.format', array('date' => $article->created_on, 'format' => '%H:%M')) ?><br />
		<?= @helper('date.format', array('date' => $article->created_on, 'format' => '%d %b')) ?>
	</div>
	<h3 class="article-title"><a href="<?= @route('view=article&id='.$article->id.'&slug='.$article->slug.'&category='.$state->category) ?>"><?= $article->title ?></a></h3>
	<?= @text('Created by') ?> <?= @escape($article->created_by_name) ?> <?= $article->last_commented_on ? '• '.@text('Latest comment about').' '.@helper('date.humanize', array('date' => $article->last_commented_on)) : '' ?> <?= $article->total_comments ? '• '.$article->total_comments.' '.@text('Comments') : '' ?>
	<span class="label" style="float: right;"><?= $article->category_title ?></span>
</div>

<div class="article-text">
	<?= @helper('com://site/news.template.helper.article.text', array('row' => $article)); ?>
</div>

<? if(isset($attachments)): ?>
<div class="article-attachments">
	<?= @template('com://site/news.view.attachments.default') ?>
</div>
<? endif; ?>