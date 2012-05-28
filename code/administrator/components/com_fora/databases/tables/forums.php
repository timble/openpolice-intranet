<?php
class ComForaDatabaseTableForums extends KDatabaseTableDefault
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'behaviors' => array('creatable', 'lockable', 'modifiable', 'orderable', 'sluggable'),
            'filters'    => array(
                'description' => array('html', 'tidy')
            ),
            'name' => 'fora_view_forums',
            'base' => 'fora_forums'
        ));

        parent::_initialize($config);
    }
}
