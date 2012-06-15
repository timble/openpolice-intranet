<?= '<?xml version="1.0" encoding="UTF-8" standalone="yes" ?>'; ?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
<channel>
	<title>Police Intranet</title>
	<description>Police Intranet RSS Feeds</description>
	<generator><?= JURI::base() ?></generator>
        
	<? foreach($activities as $activity): ?>
	<item>  
		<title><?= htmlspecialchars($activity->title) ?></title>
		<category><?= htmlspecialchars($activity->category_title) ?></category>
		<link><?= JURI::base().JRoute::_('index.php?option=com_news&view=article&slug='.$activity->article_slug.'&id='.$activity->news_article_id) ?></link>
		<description><?= htmlspecialchars(@helper('activity.message', array('row' => $activity))) ?> </description>
		<guid isPermaLink="false"><?= $activity->uuid ?></guid>		
		<comments><?= JURI::base().JRoute::_('index.php?option=com_news&view=article&slug='.$activity->article_slug.'&id='.$activity->news_article_id) ?>#comments</comments>
	</item>
	<? endforeach; ?>
	
	<link><?= KRequest::url() ?></link>
	<atom:link href="<?= KRequest::url() ?>" rel="self" type="application/rss+xml" />
</channel>
</rss>