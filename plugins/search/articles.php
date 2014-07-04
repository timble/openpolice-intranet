<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$mainframe->registerEvent( 'onSearch', 'plgSearchArticles' );
$mainframe->registerEvent( 'onSearchAreas', 'plgSearchArticlesAreas' );

JPlugin::loadLanguage( 'plg_search_articles' );

/**
 * @return array An array of search areas
 */
function &plgSearchArticlesAreas()
{
	static $areas = array(
		'articles' => 'Articles'
	);
	return $areas;
}

function plgSearchArticles( $text, $phrase='', $ordering='', $areas=null )
{
	require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_search'.DS.'helpers'.DS.'search.php');
	
	if (is_array( $areas )) {
		if (!array_intersect( $areas, array_keys( plgSearchArticlesAreas() ) )) {
			return array();
		}
	}

	// load plugin params info
 	$plugin =& JPluginHelper::getPlugin('search', 'articles');
 	$pluginParams = new JParameter( $plugin->params );

	$limit = $pluginParams->def( 'search_limit', 50 );

	$text = trim($text);
	if($text == '' ) {
		return array();
	}
	
	$articles = KService::get('com://admin/news.model.articles')
				->sort('tbl.created_on')
				->direction('DESC')
				->limit($limit)
				->search($text)
				->getList();

	$return = array();
	foreach($articles as $article)
	{
		if(searchHelper::checkNoHTML($article, $text, array('title', 'text')))
		{
			$article->origin = 'articles';
			$article->href = 'index.php?option=com_news&view=article&id='.$article->id.'&slug='.$article->slug;
			$article->section = $article->category_title;
			
			$return[] = $article->getData();
		}		
	}
	
	return $return;
}
