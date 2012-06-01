<?= @helper('behavior.mootools') ?>

<div class="page-header">
	<h1><i class="icon icon-inbox icon-white"></i><?= @text('News') ?></h1>
	<? if($agent) : ?>
	<div class="toolbar">
	    <a class="btn btn-primary btn-small" href="<?= @route('view=article&layout=form&category='.$state->category) ?>">
	        <i class="icon-plus icon-white"></i> <?= @text('New') ?>
	    </a>
    </div>
	<? endif ?>
</div>

<div class="articles">
	<? foreach($articles as $article) : ?>
		<div class="article">
			<?= @template('com://site/news.view.article.default_article', array('article' => $article)) ?>
			<div class="article-toolbar">
				<a class="btn btn-small" href="<?= @route('view=article&id='.$article->id.'&slug='.$article->slug.'&category='.$state->category) ?>"><?= @text('Read more') ?> <i class="icon-arrow-right"></i></a>
			</div>
		</div>
	<? endforeach ?>
</div>

<module title="Filter" position="left">
	<?= @template('com://site/news.view.categories.list', array('categories' => @service('com://site/news.model.categories')->getList()))?>
	<form action="" method="get" class="-koowa-form form-stacked">
		<?= @helper('behavior.calendar',
				array(
					'date' => $state->start_date,
					'name' => 'start_date',
					'format' => '%Y-%m-%d'
				)); ?>
		<input class="btn btn-primary" type="submit" value="<?= @text('Go') ?>" />
	</form>
</module>