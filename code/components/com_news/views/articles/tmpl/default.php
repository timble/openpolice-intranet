<? if($forum->open || $agent) : ?>
    <a class="btn btn-primary btn-small" href="<?= @route('view=article&layout=form&category='.$state->category) ?>">
        <?= @text('New') ?>
    </a>
<? endif ?>

<div class="articles">
	<? foreach($articles as $article) : ?>
	<?= @template('com://site/news.view.article.default_article', array('article' => $article)) ?>
	<? endforeach ?>
</div>