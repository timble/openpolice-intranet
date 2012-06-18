<?php
class ComCalendarModelDays extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->_state
            ->insert('event', 'int');
    }
    
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;

 
            if($state->event) {
                $query->where('tbl.calendar_event_id', '=', $state->event);
            }
        
        
        parent::_buildQueryWhere($query);
    }
}