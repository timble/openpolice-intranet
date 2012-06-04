<?php
class ComForaControllerComment extends ComCommentsControllerComment
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->addBehavior('com://admin/attachments.controller.behavior.attachable')
        	->addBehavior('com://admin/fora.controller.behavior.loggable');
        
        $this->getModel()->getTable()
            ->addBehavior('com://admin/fora.database.behavior.attachable')
            ->addBehavior('com://admin/fora.database.behavior.commentable')
            ->addBehavior('com://admin/fora.database.behavior.notifiable');
    }
    
    protected function _actionDelete(KCommandContext $context)
    {
        $data = parent::_actionDelete($context);
        
        // TODO: Remove this temporary when upgrading Nooku Framework.
        if ($context->status == KHttpResponse::NO_CONTENT) {
            $context->status = KHttpResponse::OK;
        }
        
        $this->setRedirect(KRequest::referrer(), JText::_('Comment has been deleted.'), 'message');
        
        return $data;
    }
}