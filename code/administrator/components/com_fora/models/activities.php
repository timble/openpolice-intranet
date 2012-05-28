<?php
class ComForaModelActivities extends ComActivitiesModelActivities
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->_state
            ->insert('category', 'int')
        	->insert('forum', 'int')
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
                $query->where('tbl.fora_category_id', '=', $state->category);
            }
            
            if($state->forum) {
            	$query->where('tbl.fora_forum_id', '=', $state->forum);
            }
        }

        parent::_buildQueryWhere($query);
    }
    
    protected function _buildQueryOrder($query)
    {
    	parent::_buildQueryOrder($query);
    }
}