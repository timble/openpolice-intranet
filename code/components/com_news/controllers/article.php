<?php
class ComNewsControllerArticle extends ComDefaultControllerDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->addBehavior('com://admin/attachments.controller.behavior.attachable');
        
    	$this->registerCallback('after.save', array($this, 'afterSave'));
    }
    
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
    
    public function afterSave(KCommandContext $context)
    {
        $this->setRedirect($this->getView()->createRoute('layout=default&id='.$this->getModel()->getItem()->id.'&slug='.$topic->slug));
    }
}