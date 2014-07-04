<?php
class ComNewsDatabaseTableComments extends ComCommentsDatabaseTableComments
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'behaviors' => array(
            	'creatable', 'lockable', 'modifiable', 'sluggable', 'attachable'
            )
        ));
        
        parent::_initialize($config);
    }
}