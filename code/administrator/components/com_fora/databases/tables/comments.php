<?php
class ComForaDatabaseTableComments extends KDatabaseTableDefault
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'identity_column' => 'comments_comment_id'
        ));
        
        parent::_initialize($config);
    }
}