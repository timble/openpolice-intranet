<?php
class ComNewsDatabaseTableCategories extends KDatabaseTableDefault
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'behaviors' => array(
            	'creatable', 'lockable', 'modifiable', 'sluggable',
            ),
            'filters' => array(
            	'description' => 'html', 'tidy'
            )
        ));
        
        parent::_initialize($config);
    }
}