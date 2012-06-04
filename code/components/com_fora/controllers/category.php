<?php
class ComForaControllerCategory extends ComDefaultControllerDefault
{
    protected function _actionBrowse(KCommandContext $context)
    {
        $user = JFactory::getUser();
        
        if($user->gid == 18)
        { 
            $subscriptions = $this->getService('com://admin/subscriptions.model.subscriptions')
                ->user_id($user->id)
                ->status('active')
                ->getList();
            
            $this->getModel()->set(array(
                'published'    => true,
                'product' => $subscriptions->getColumn('subscriptions_product_id')
            ));
        }

        return parent::_actionBrowse($context);
    }
}