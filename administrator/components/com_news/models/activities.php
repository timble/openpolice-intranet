<?php
class ComNewsModelActivities extends ComActivitiesModelActivities
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->_state
            ->insert('category', 'int')
        	->insert('sort', 'cmd', 'created_on')
        	->insert('direction', 'word', 'desc')
        	->insert('limit', 'int', 50)
        	->insert('subscribed', 'boolean');
    }
    
    protected function _buildQueryJoins(KDatabaseQuery $query)
    {
    	parent::_buildQueryJoins($query);
    	 
    	if(!$this->_state->isUnique())
    	{
    		if($this->_state->subscribed)
    		{
    			$query->join('RIGHT', 'news_subscriptions AS subscription', 'subscription.news_article_id = tbl.news_article_id');
    		}
    	}
    }
    
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;
  
        if(!$state->isUnique())
        {
        	if($state->subscribed)
        	{
        		$user = JFactory::getUser();
        	
        		$query->where('subscription.user_id', '=', $user->id);
        	}
        	
            if($state->category) {
                $query->where('tbl.news_category_id', '=', $state->category);
            }
        }

        parent::_buildQueryWhere($query);
    }
    
    protected function _buildQueryOrder($query)
    {
    	parent::_buildQueryOrder($query);
    }
}