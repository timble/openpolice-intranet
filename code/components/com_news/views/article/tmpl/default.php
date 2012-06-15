<script src="media://lib_koowa/js/koowa.js" />

<script type="text/javascript">
window.addEvent('domready', function()
{

	$('delete').addEvent('click', function(e)
	{
		e.stop();

		if(!confirm('<?= addslashes(@text('Are you sure you want to delete this article?')) ?>')) {
			return;
		}

		this.addClass('disabled');
		$('edit').addClass('disabled');
		
		var request = new Request({
			method: 'post',
			url: '<?= @route('view=article') ?>',
			data: {
				id: '<?= $article->id ?>',
				_token: '<?= JUtility::getToken() ?>',
				action: 'delete'
			},
			onSuccess: function(){
				window.location.href = '<?= KRequest::referrer() ?>';
			},
			onFailure: function(){
				this.removeClass('disabled');
				$('edit').removeClass('disabled');
				alert('<?= addslashes(@text('Failed to delete. Please try again.')) ?>');
			}.bind(this)
		}).send();
	});
});
</script>

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
	    <a class="btn btn-small" href="<?= @route('layout=form&id='.$article->id) ?>" id="edit"><i class="icon-pencil"></i> <?= @text('Edit') ?></a>
	    <a class="btn btn-danger btn-small" id="delete" href="#"><i class="icon-minus icon-white"></i> <?= @text('Delete') ?></a>
	</div>
</module>
<? endif ?>

<? if($agent) : ?>
    <module title="You are a moderator" position="right"><?= @template('default_sidebar'); ?></module>
<? endif ?>