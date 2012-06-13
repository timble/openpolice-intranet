<div class="articles">
	<? if($agent) : ?>
	<div class="articles-toolbar">
	    <a class="btn btn-primary btn-small" href="<?= @route('view=article&layout=form&category='.$state->category) ?>">
	        <i class="icon-plus icon-white"></i> <?= @text('New') ?>
	    </a>
	</div>
	<? endif ?>
	<? foreach($articles as $article) : ?>
		<div class="article">
			<?= @template('com://site/news.view.article.default_article', array('article' => $article)) ?>
			<div class="article-toolbar">
				<a class="btn btn-small" href="<?= @route('view=article&id='.$article->id.'&slug='.$article->slug) ?>"><?= @text('Read more') ?> <i class="icon-arrow-right"></i></a>
			</div>
		</div>
	<? endforeach ?>
</div>

<?= @template('default_filter') ?>

<module title="" position="header">
	<?= @template('com://site/news.view.grid.search', array('state' => $state)) ?>
</module>

<module title="" position="sidebar">
	<h3>Eventementen</h3>
	<ul class="module-events">
		<li>Actie 1<br /><small>Tomorrow</small></li>
		<li>Actie 2<br /><small>21-06</small></li>
		<li>Actie 3<br /><small>28-06</small></li>
	</ul>
</module>