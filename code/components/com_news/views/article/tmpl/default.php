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
	<div class="toolbar btn-group">
	    <a class="btn  btn-small" href="<?= @route('layout=form&id='.$article->id) ?>"><i class="icon-pencil"></i> <?= @text('Edit') ?></a>
	    <a class="btn btn-danger btn-small" href="#"><i class="icon-minus icon-white"></i> <?= @text('Delete') ?></a>
	</div>
</module>
<? endif ?>

<? if($agent) : ?>
    <module title="You are a moderator" position="right"><?= @template('default_sidebar'); ?></module>
<? endif ?>