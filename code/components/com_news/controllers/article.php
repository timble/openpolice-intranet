<?php
class ComNewsControllerArticle extends ComDefaultControllerDefault
{
    protected function _initialize($config)
    {
        $config->append(array(
            'request' => array(
                'sort'      => 'created_on',
            	'direction' => 'desc'
            )
        ));
        
        parent::_initialize($config);
    }
}