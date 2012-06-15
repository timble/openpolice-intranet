<?= '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>'; ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
	<title>Police Intranet</title>
	<description>Police Intranet RSS Feeds</description>
	<generator><?= JURI::base() ?></generator>
        
	<? foreach($articles as $article): ?>
	<item>  
		<title><?= htmlspecialchars($article->title) ?></title>
		<category><?= htmlspecialchars($article->category_title) ?></category>
		<link><?= JURI::base().JRoute::_('index.php?option=com_news&view=article&slug='.$article->slug.'&id='.$article->id) ?></link>
		<description><?= htmlspecialchars($article->text) ?></description>
		<guid isPermaLink="false"><?= $article->uuid ?></guid>		
		<comments><?= JURI::base().JRoute::_('index.php?option=com_news&view=article&slug='.$article->slug.'&id='.$article->id) ?>#comments</comments>
	</item>
	<? endforeach; ?>
	
	<link><?= KRequest::url() ?></link>
	<atom:link href="<?= KRequest::url() ?>" rel="self" type="application/rss+xml" />
</channel>
</rss>