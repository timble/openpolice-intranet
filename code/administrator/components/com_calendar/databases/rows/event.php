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
		    	
		    	$days = (date('Ymd', strtotime($this->end_date)) - date('Ymd', strtotime($this->start_date)));
		    	
		    	$nextday = $this->start_date;
		    	$days_count = '0';
		    	
		    	while($days >= $days_count) {
		    	
		    		if($days_count == '0') {
			    		$day = $this->start_date;
		    		} elseif($days_count == $days) {
			    		$day = $this->end_date;
		    		} else {
			    		$nextday = strtotime('+1 day', strtotime($nextday));
			    		$nextday = date('Y-m-d', $nextday);
			    		$day = $nextday;
		    		}	    		
		    		
	    			$row = $this->getService('com://admin/calendar.database.row.day');
	    			
	    			$row->calendar_event_id	= $this->id;
	    			$row->date 				= strtotime($day);
	    			$row->year				= date('Y', strtotime($day));
	    			$row->month				= date('m', strtotime($day));
	    			$row->day				= date('d', strtotime($day));
	    			$row->hour				= date('H', strtotime($day));
	    			$row->minute			= date('i', strtotime($day));
	    			$row->second			= date('s', strtotime($day));
	    			$row->week				= date('W', strtotime($day));
	    			
	    			$row->save();
	    			
	    			$days_count++;
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