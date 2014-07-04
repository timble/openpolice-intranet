<?php
class ComCalendarModelDays extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->_state
            ->insert('event', 'int')
            ->insert('year', 'int')
            ->insert('month', 'int')
            ->insert('day', 'int');
    }
    
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;

        if($state->event) {
            $query->where('tbl.calendar_event_id', '=', $state->event);
        }
        
        if($state->year) {
            $query->where('tbl.year', '=', $state->year);
        }
        
        if($state->month) {
            $query->where('tbl.month', '=', $state->month);
        }
        
        if($state->day) {
            $query->where('tbl.day', '=', $state->day);
        }
                
        parent::_buildQueryWhere($query);
    }
}