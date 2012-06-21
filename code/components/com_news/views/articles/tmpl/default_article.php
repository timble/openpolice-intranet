<div class="article-header <?= $article->category_slug ?>">
	<div class="date">
		<?= @helper('date.format', array('date' => $article->created_on, 'format' => '%H:%M')) ?><br />
		<?= @helper('date.format', array('date' => $article->created_on, 'format' => '%d %b')) ?>
	</div>
	<h3 class="article-title"><a href="<?= @route('view=article&id='.$article->id.'&slug='.$article->slug.'&category='.$state->category) ?>"><?= $article->title ?></a></h3>
	<?= @text('Created by') ?> <a href="mailto:<?= $article->created_by_email ?>"><?= @escape($article->created_by_name) ?></a> <?= $article->last_commented_on ? '• '.$article->total_comments.' '.@text('Comments').', '.@text('latest about').' '.@helper('date.humanize', array('date' => $article->last_commented_on)) : '' ?>
	<span class="label label-<?= json_decode($article->category_params)->color ?>" style="float: right;"><?= $article->category_title ?></span>
</div>

<div class="article-text">
	<?= @helper('com://site/news.template.helper.article.text', array('row' => $article)); ?>
</div>

<? if(isset($attachments)): ?>
<div class="article-attachments">
	<?= @template('com://site/news.view.attachments.default') ?>
</div>
<? endif; ?>

<div class="article-toolbar">
	<a class="btn btn-small" href="<?= @route('view=article&id='.$article->id.'&slug='.$article->slug) ?>"><?= @text('Read more') ?> <i class="icon-arrow-right"></i></a>
</div>