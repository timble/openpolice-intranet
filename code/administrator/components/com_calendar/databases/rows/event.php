<?php

class ComCalendarDatabaseRowEvent extends KDatabaseRowDefault
{   
    public function save() {
    	
    	$modified = $this->getModified();
    	
    	if($result = parent::save()) {
    		if(in_array('start_date', $modified) || in_array('end_date', $modified)) {
				
				// Remove all the days for this event
		    	foreach ($this->getService('com://admin/calendar.model.days')->event($this->id)->getList() as $value) {		
		    		$this->getService('com://admin/calendar.model.days')->id($value->id)->getItem()->delete();
		    	}
		    	
		    	if($this->start_date) {
		    		$day = $this->getService('com://admin/calendar.database.row.day');
		    		
		    		$day->calendar_event_id	= $this->id;
		    		$day->date				= $this->start_date;
		    		$day->year				= date('Y', strtotime($this->start_date));
		    		$day->month				= date('m', strtotime($this->start_date));
		    		$day->day				= date('d', strtotime($this->start_date));
		    		$day->hour				= date('H', strtotime($this->start_date));
		    		$day->minute			= date('i', strtotime($this->start_date));
		    		$day->second			= date('s', strtotime($this->start_date));
		    		
		    		$day->save();	    	
		    	}
		    	
		    	$nextday = $this->start_date;
		    	$end_date = date('Y-m-d', strtotime($this->end_date));
		    	
		    	while($nextday != $end_date) {
		    		$nextday = strtotime('+1 day', strtotime($nextday));
		    		$nextday = date('Y-m-d', $nextday);
		    		
	    			$day = $this->getService('com://admin/calendar.database.row.day');
	    			
	    			$day->calendar_event_id	= $this->id;
	    			
	    			if($nextday == $end_date) {
	    				$day->date = $this->end_date;
	    				$day->year				= date('Y', strtotime($this->end_date));
	    				$day->month				= date('m', strtotime($this->end_date));
	    				$day->day				= date('d', strtotime($this->end_date));
	    				$day->hour				= date('H', strtotime($this->end_date));
	    				$day->minute			= date('i', strtotime($this->end_date));
	    				$day->second			= date('s', strtotime($this->end_date));
	    			} else {
	    				$day->date = $nextday;
	    				$day->year				= date('Y', strtotime($nextday));
	    				$day->month				= date('m', strtotime($nextday));
	    				$day->day				= date('d', strtotime($nextday));
	    			}
	    			
	    			$day->save();    	
		    	}  	
			}
    	}
    	
        return $result;
    }
    
    public function delete()
    {   	    		
    	return parent::delete();
    }
}