<?= @helper('behavior.mootools') ?>

<script inline>
window.addEvent('domready', function(){
	/* Reset the filter values to blank */
	document.id('activities-filter').addEvent('reset', function(e){
		e.target.getElements('input').each(function(el){
			if(['days_back','start_date', 'user'].contains(el.name)){
				el.value = '';
			}
		});
		e.target.submit();
	});
});
</script>

<div class="articles">
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

<? if($agent) : ?>
<module title="" position="actions">
	<div class="toolbar">
	    <a class="btn btn-primary btn-small" href="<?= @route('view=article&layout=form&category='.$state->category) ?>">
	        <i class="icon-plus icon-white"></i> <?= @text('New') ?>
	    </a>
	</div>
</module>
<? endif ?>

<module title="" position="header">
	<?= @template('com://site/news.view.grid.search', array('state' => $state)) ?>
</module>