<?= $article->title ?>

<div class="frame__header">
    <h2><?= @text('Comments') ?></h2>
</div>

<div class="content spacing">
	<?= @service('com://site/news.controller.comment')
	    ->view('comments')
	    ->table('news_articles')
	    ->row($article->id)
	    ->display();
	?>
</div>

<div class="content comments">
	<? if($article->commentable) : ?>
	<?= @service('com://site/news.controller.comment')
	    ->view('comment')
	    ->layout('form')
	    ->table('news_articles')
	    ->row($article->id)
	    ->display();
	?>
	<? else : ?>
	<p class="spacing"><?= @text('Topic is closed for comments') ?></p>
	<? endif; ?>
</div>