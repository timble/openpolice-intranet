<script src="media://lib_koowa/js/koowa.js" />
<script src="media://com_news/js/subscribe.js" />
<script src="media://com_news/js/delete.js" />

<script type="text/javascript">
window.addEvent('domready', function()
{
    new News.Subscribe({
        holder: 'article-toolbar',
        url: '<?= html_entity_decode(@route('view=subscription&news_article_id='.$article->id.'&user_id='.JFactory::getUser()->id)) ?>',
        data: {
            action: '<?= $subscribed ? 'delete' : 'add' ?>',
            news_article_id: '<?= $article->id ?>',
            user_id: '<?= JFactory::getUser()->id ?>',
            _token: '<?= JUtility::getToken() ?>'
        }
    });

    new News.Delete({
        holder: 'article-toolbar',
        url: '<?= html_entity_decode(@route('view=article')) ?>',
        forward: '<?= html_entity_decode(KRequest::referrer()) ?>',
        data: {
			id: '<?= $article->id ?>',
			_token: '<?= JUtility::getToken() ?>',
			action: 'delete'			
        }
    });
});
</script>

<div class="article">
	<?= @template('default_article') ?>
	
	<? if(JFactory::getUser()->id): ?>
	<div class="article-toolbar btn-group" id="article-toolbar">
		<a class="btn btn-mini subscribe"><i class="icon-<?= $subscribed ? 'star' : 'star-empty' ?>"></i> <?= @text($subscribed ? 'Unsubscribe' : 'Subscribe') ?></a>
		<? if($agent): ?>	
	    	<a class="btn btn-mini edit" href="<?= @route('layout=form&id='.$article->id) ?>"><i class="icon-pencil"></i> <?= @text('Edit') ?></a>
	    	<a class="btn btn-danger btn-mini delete" href="#"><i class="icon-minus icon-white"></i> <?= @text('Delete') ?></a>
	    <? endif; ?>
	</div>
	<? endif ?>
		
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
    <module title="You are a moderator" position="sidebar"><?= @template('default_sidebar'); ?></module>
<? endif ?>