<?php
class ComNewsDatabaseTableArticles extends KDatabaseTableDefault
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'behaviors' => array(
            	'creatable', 'lockable', 'modifiable', 'sluggable',
                'com://admin/attachments.database.behavior.attachable'
            ),
            'filters' => array(
            	'text' => 'html', 'tidy'
            ),
            'name' => 'news_view_articles',
            'base' => 'news_articles'
        ));
        
        parent::_initialize($config);
    }
}