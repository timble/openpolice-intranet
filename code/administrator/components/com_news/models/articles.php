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
            ->insert('end_date', 'date');
    }
    
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;

        if(!$state->isUnique())
        {
            if($state->enabled) {
                $query->where('tbl.enabled', '=', (int) $state->enabled);
            }
            
            if($state->category) {
                $query->where('tbl.news_category_id', '=', $state->category);
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