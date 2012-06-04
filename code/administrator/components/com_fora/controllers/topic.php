<?php
class ComForaControllerTopic extends ComDefaultControllerDefault
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'behaviors' => array(
            				'com://admin/attachments.controller.behavior.attachable',
            				'com://admin/fora.controller.behavior.loggable'
            			)
        ));
        
        parent::_initialize($config);
    }
}