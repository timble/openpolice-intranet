<div class="article">
	<?= @template('default_article') ?>
	
	<div class="comments">
		<h3 class="title"><?= $article->total_comments ?> <?= @text('Comments') ?></h3>
		
		<?= @service('com://site/news.controller.comment')
		    ->view('comments')
		    ->table('news_articles')
		    ->row($article->id)
		    ->display();
		?>
		
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
</div>

<? if($agent) : ?>
<module title="" position="actions">
	
</module>
<? endif ?>

<? if($agent) : ?>
    <module title="You are a moderator" position="right"><?= @template('default_sidebar'); ?></module>
<? endif ?>