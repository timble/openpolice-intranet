<?php
class ComNewsControllerComment extends ComCommentsControllerComment
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->addBehavior('com://admin/attachments.controller.behavior.attachable');
        
        $this->getModel()->getTable()
            ->addBehavior('com://admin/attachments.database.behavior.attachable')
            ->addBehavior('com://admin/comments.database.behavior.discussible');
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