<? if($forum->open || $agent) : ?>
    <a class="btn btn-primary btn-small" href="<?= @route('view=article&layout=form&category='.$state->category) ?>">
        <?= @text('New') ?>
    </a>
<? endif ?>

<? foreach($articles as $article) : ?>
	<div class="page-header <?= $article->category_slug ?>">
		<h1><?= $article->title ?></h1>
		<?= @text('Posted on') ?> <?= @helper('date.format', array('date' => $article->created_on, 'format' => @text('DATE_FORMAT_LC2'))) ?> <?= @text('by') ?> <?= @escape($article->created_by_name) ?>
	</div>
	<a href="<?= @route('view=article&id='.$article->id.'&slug='.$article->slug) ?>">
	    <?= @escape($article->title) ?>
	</a>
<? endforeach ?>