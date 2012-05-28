<?php
class ComForaControllerCategory extends ComDefaultControllerDefault
{
    protected function _actionBrowse(KCommandContext $context)
    {
        $user = JFactory::getUser();
        
        if($user->gid == 18)
        { 
            $subscribers = $this->getService('com://admin/subscriptions.model.subscribers')
                ->user_id($user->id)
                ->getList();
            
            $this->getModel()->set(array(
                'published'    => true,
                'subscription' => $subscribers->getColumn('subscriptions_subscription_id')
            ));
        }
        
        return parent::_actionBrowse($context);
    }
}