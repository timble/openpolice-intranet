<?php
class ComNewsModelArticles extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->_state
            ->insert('enabled', 'int')
            ->insert('category', 'int')
            ->insert('start_date', 'date')
            ->insert('end_date', 'date')
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
        	
            if($state->enabled) {
                $query->where('tbl.enabled', '=', (int) $state->enabled);
            }
            
            if($state->category) {
                $query->where('tbl.news_category_id', '=', $state->category);
            }
            
            if($state->search)
            {
                $query
                    ->where('(', null, null, 'AND')
                    ->where('tbl.title', 'LIKE', '%'.$state->search.'%', '')
                    ->where('tbl.text', 'LIKE', '%'.$state->search.'%', 'OR')
                    ->where(')', null, null, '');
            }
            
            if (($this->_state->start_date && $this->_state->start_date != '0000-00-00'))
    		{
    			$start_date = $this->getService('koowa:date', array('date' => $this->_state->start_date));
    			$end_date = $this->getService('koowa:date', array('date' => $this->_state->end_date));
    			$start      = $start_date->addDays(1)->addSeconds(-1)->getDate();
    			$end      	= $end_date->addDays(1)->addSeconds(-1)->getDate();
    
    			$query->where('tbl.created_on', '>', $start);
    			$query->where('tbl.created_on', '<', $end);
    		}
        }
        
        parent::_buildQueryWhere($query);
    }
}