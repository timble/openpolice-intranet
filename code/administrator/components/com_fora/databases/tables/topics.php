<?php
class ComForaDatabaseTableTopics extends KDatabaseTableDefault
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'behaviors' => array(
            	'creatable', 'lockable', 'modifiable', 'notifiable', 'sluggable', 'votable',
                'com://admin/attachments.database.behavior.attachable'
            ),
            'filters' => array(
            	'text' => 'html', 'tidy'
            ),
            'name' => 'fora_view_topics',
            'base' => 'fora_topics'
        ));
        
        parent::_initialize($config);
    }
}