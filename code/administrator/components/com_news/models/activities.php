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
        	->insert('limit', 'int', 50);
    }
    
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;
  
        if(!$state->isUnique())
        {
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