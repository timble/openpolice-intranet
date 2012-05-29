<div class="article">
	<div class="page-header <?= $article->category_slug ?>">
		<h1><a href="<?= @route('view=article&id='.$article->id.'&slug='.$article->slug) ?>"><?= $article->title ?></a></h1>
		<?= @text('Posted on') ?> <?= @helper('date.format', array('date' => $article->created_on, 'format' => @text('DATE_FORMAT_LC2'))) ?> <?= @text('by') ?> <?= @escape($article->created_by_name) ?>
		<span class="label" style="float: right;"><?= $article->category_title ?></span>
	</div>
	
	<?= @helper('com://site/news.template.helper.article.text', array('row' => $article)); ?>
</div>