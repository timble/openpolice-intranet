<?php
class ComForaModelCategories extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->_state
            ->insert('published', 'boolean')
            ->insert('subscription', 'int');
    }
    
    protected function _buildQueryJoins(KDatabaseQuery $query)
    {
        $state = $this->_state;
        
        if(!$state->isUnique())
        {
            if(!is_null($state->subscription) && !empty($state->subscription))
            {
                $ids = !empty($state->subscription) ? implode(',', (array) $state->subscription) : 0;
                
                $query->join('RIGHT', 'fora_categories_subscriptions AS subscription',
                	'subscription.fora_category_id = tbl.fora_category_id AND subscription.subscriptions_subscription_id IN ('.$ids.')');
            }
        }
    }
    
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;
        
        if(!$state->isUnique())
        {
            if(is_bool($state->published)) {
                $query->where('tbl.enabled', '=', (int) $state->published);
            }
        }
        
        parent::_buildQueryWhere($query);
    }
}