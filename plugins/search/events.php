<?php
// no direct access
defined( '_JEXEC' ) or die( 'Restricted access' );

$mainframe->registerEvent( 'onSearch', 'plgSearchEvents' );
$mainframe->registerEvent( 'onSearchAreas', 'plgSearchEventsAreas' );

JPlugin::loadLanguage( 'plg_search_events' );

/**
 * @return array An array of search areas
 */
function &plgSearchEventsAreas()
{
	static $areas = array(
		'events' => 'Events'
	);
	return $areas;
}

function plgSearchEvents( $text, $phrase='', $ordering='', $areas=null )
{
	require_once(JPATH_ADMINISTRATOR.DS.'components'.DS.'com_search'.DS.'helpers'.DS.'search.php');
	
	if (is_array( $areas )) {
		if (!array_intersect( $areas, array_keys( plgSearchEventsAreas() ) )) {
			return array();
		}
	}

	// load plugin params info
 	$plugin =& JPluginHelper::getPlugin('search', 'events');
 	$pluginParams = new JParameter( $plugin->params );

	$limit = $pluginParams->def( 'search_limit', 50 );

	$text = trim($text);
	if($text == '' ) {
		return array();
	}
	
	$events = KService::get('com://admin/calendar.model.events')
				->sort('tbl.start_date')
				->direction('ASC')
				->limit($limit)
				->search($text)
				->getList();

	$return = array();
	foreach($events as $event)
	{
		if(searchHelper::checkNoHTML($event, $text, array('title', 'description')))
		{
			$event->text = $event->description;
			$event->origin = 'events';
			$event->href = 'index.php?option=com_calendar&view=event&id='.$event->id.'&slug='.$event->slug;
			$event->section = JText::_('Events');
			
			$return[] = $event->getData();
		}		
	}
	
	return $return;
}
