<?php
class ComForaDatabaseTableCategories extends KDatabaseTableDefault
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'behaviors'  => array('creatable', 'lockable', 'modifiable', 'orderable', 'sluggable'),
            'filters'    => array(
                'description' => array('html', 'tidy')
            ),
            'name' => 'fora_view_categories',
            'base' => 'fora_categories'
        ));

        parent::_initialize($config);
    }
}
