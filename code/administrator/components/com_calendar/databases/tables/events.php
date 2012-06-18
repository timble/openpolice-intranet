<?php
class ComCalendarDatabaseTableEvents extends KDatabaseTableDefault
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'behaviors' => array(
            	'creatable', 'lockable', 'modifiable', 'sluggable', 'attachable'
            ),
            'filters' => array(
            	'text' => 'html', 'tidy'
            ),
            'name' => 'calendar_view_events',
            'base' => 'calendar_events'
        ));
        
        parent::_initialize($config);
    }
}