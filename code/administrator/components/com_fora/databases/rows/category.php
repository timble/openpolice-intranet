<?php
class ComForaDatabaseRowCategory extends KDatabaseRowDefault
{
    public function save()
    {
        $modified = $this->getModified();
        
        if($result = parent::save())
        {
            if(in_array('subscriptions_subscription_id', $modified))
            {
                foreach($this->subscriptions as $subscription)
                {
                    if(!in_array($subscription->id, $this->subscriptions_subscription_id)) {
                        $subscription->delete();
                    } else {
                        unset($this->subscriptions_subscription_id[$subscription->id]);
                    }
                }
                
                foreach($this->subscriptions_subscription_id as $subscription)
                {
                    $this->subscriptions->getRow(array(
                        'data' => array(
                        	'fora_category_id' => $this->id,
                            'subscriptions_subscription_id' => $subscription
                        )
                    ))->save();
                }
            }
        }
        
        return $result;
    }
    
    public function __get($name)
    {
        if($name == 'subscriptions' && !isset($this->_data['subscriptions']))
        {
            $this->_data['subscriptions'] = $this->getService('com://admin/fora.database.table.categories_subscriptions')
                ->select(array('fora_category_id' => (int) $this->id));
        }
        
        return parent::__get($name);
    }
}