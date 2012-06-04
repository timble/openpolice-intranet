<?php
class ComForaControllerVote extends ComDefaultControllerDefault
{
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
	
		$this->addBehavior('com://admin/fora.controller.behavior.loggable');
	}
	
    protected function _initialize(KConfigInterface $config)
    {
        parent::_initialize($config);
        
        if(KRequest::method() != 'GET')
        {
            $config->request->append(array(
            	'fora_topic_id' => KRequest::get('post.fora_topic_id', 'int')
            ));
            
            $config->request->user_id = JFactory::getUser()->id;
        }
    }
}