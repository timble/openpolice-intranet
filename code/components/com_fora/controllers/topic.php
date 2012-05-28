<?php
class ComForaControllerTopic extends ComDefaultControllerDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->addBehavior('com://admin/attachments.controller.behavior.attachable')
        	->addBehavior('com://site/fora.controller.behavior.loggable');
        
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
    
    protected function _actionBrowse(KCommandContext $context)
    {
        if(JFactory::getUser()->gid == 18) {
            $this->getModel()->published = true;
        }
        
        return parent::_actionBrowse($context);
    }
    
    public function afterSave(KCommandContext $context)
    {
        $this->setRedirect($this->getView()->createRoute('layout=default&id='.$this->getModel()->getItem()->id.'&slug='.$topic->slug));
    }
}