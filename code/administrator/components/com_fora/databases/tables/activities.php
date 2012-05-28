<?php
class ComForaDatabaseTableActivities extends KDatabaseTableDefault
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'name' => 'fora_view_activities',
            'base' => 'activities_activities'
        ));

        parent::_initialize($config);
    }
}
