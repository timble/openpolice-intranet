<?php
class ComNewsControllerArticle extends ComDefaultControllerDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->addBehavior('com://admin/attachments.controller.behavior.attachable')
        	->addBehavior('com://site/news.controller.behavior.loggable');
        
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
        
        if(KRequest::method() != 'GET')
        {
        	$config->request->append(array(
        		'id' => KRequest::get('post.id', 'int')
        	));
        }
        
        parent::_initialize($config);
    }
    
    public function afterSave(KCommandContext $context)
    {
        $this->setRedirect($this->getView()->createRoute('layout=default&id='.$this->getModel()->getItem()->id.'&slug='.$topic->slug));
    }
}