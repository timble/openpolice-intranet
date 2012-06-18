<?php
class ComCalendarControllerEvent extends ComDefaultControllerDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->addBehavior('com://admin/attachments.controller.behavior.attachable');
    }
    
    protected function _initialize($config)
    {
        $config->append(array(
            'request' => array(
                'sort'      => 'title',
            	'direction' => 'asc'
            )
        ));
        
        parent::_initialize($config);
    }
}