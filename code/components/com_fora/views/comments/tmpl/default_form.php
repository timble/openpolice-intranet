<? if($topic->commentable) : ?>
	<?= @service('com://site/fora.controller.comment')
	    ->view('comment')
	    ->layout('form')
	    ->table('fora_topics')
	    ->row($topic->id)
	    ->display();
	?>
<? else : ?>
		<p><?= @text('Topic is closed for comments') ?></p>
<? endif; ?>