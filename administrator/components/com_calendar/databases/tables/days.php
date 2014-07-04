<?php
class ComCalendarDatabaseTableDays extends KDatabaseTableDefault
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'name' => 'calendar_view_days',
            'base' => 'calendar_days'
        ));
        
        parent::_initialize($config);
    }
}