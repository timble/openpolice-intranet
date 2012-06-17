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

    <? if($agent): ?>
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
    <? endif; ?>
});
</script>

<div class="article">
	<?= @template('default_article') ?>
	
	<div class="comments">
		<h3 class="title"><?= $article->total_comments ?> <?= @text('Comments') ?> <small><?= $article->last_commented_on ? @text('latest about').' '.@helper('date.humanize', array('date' => $article->last_commented_on)) : '' ?></small></h3>
		
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
		<div class="alert alert-info" style="margin: 20px;">
			<?= @text('Closed for comments') ?>
		</div>
		<? endif; ?>
	</div>
</div>

<module title="" position="scopebar">
	<? if(JFactory::getUser()->id): ?>
	<div class="btn-toolbar" id="article-toolbar">
		<div class="date">
			<?= @helper('date.format', array('date' => $article->created_on, 'format' => '%H:%M')) ?><br />
			<?= @helper('date.format', array('date' => $article->created_on, 'format' => '%d %b')) ?>
		</div>
		<h1><?= $article->title ?> <small><?= @text('by') ?> <a href="mailto:<?= $article->created_by_email ?>"><?= @escape($article->created_by_name) ?></a> in <span class="label label-<?= json_decode($article->category_params)->color ?>"><?= $article->category_title ?></span></small></h1>
		<div class="btn-group pull-right" style="margin-left: 8px;">
			<a class="btn btn-small btn-warning subscribe<?= $subscribed ? ' active' : '' ?>"><i class="icon-white icon-<?= $subscribed ? 'star' : 'star-empty' ?>"></i></a>
		</div>
		<div class="btn-group pull-right">
			<? if($agent): ?>	
		    	<a class="btn btn-small edit" href="<?= @route('layout=form&id='.$article->id) ?>"><i class="icon-pencil"></i></a>
		    	<a class="btn btn-small delete" href="#"><i class="icon-trash"></i></a>
		    <? endif; ?>
		</div>
	</div>
	<? endif ?>
</module>

<? if($agent) : ?>
    <module title="You are a moderator" position="sidebar"><?= @template('default_sidebar'); ?></module>
<? endif ?>