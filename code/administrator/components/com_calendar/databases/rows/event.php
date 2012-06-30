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
		    	$i = '0';
		    	
		    	while($days >= $i) {
					
					$row = $this->getService('com://admin/calendar.database.row.day');
					
					// Set $day based on the $ier
		    		if($i == '0') {
			    		$day = $this->start_date;
		    		} elseif($i == $days) {
			    		$day = $this->end_date;
		    		} else {
			    		$day = strtotime('+1 day', strtotime($day));
			    		$day = date('Y-m-d', $day);
		    		}
		    		
		    		// Set $level based on the first day of the event or when the event spreads across multiple weeks
		    		if($i == '0') {
			    		$level = $this->getService('com://admin/calendar.model.days')->month(date('m', strtotime($day)))->day(date('d', strtotime($day)))->sort('level')->getList()->top()->level;
			    		$level = $level + 1;
		    		} elseif(date('W', strtotime($previousDay)) != date('W', strtotime($day))) {
			    		$level = $this->getService('com://admin/calendar.model.days')->month(date('m', strtotime($day)))->day(date('d', strtotime($day)))->sort('level')->getList()->top()->level;
			    		$level = $level + 1;
		    		}

	    			$row->calendar_event_id	= $this->id;
	    			$row->date 				= strtotime($day);
	    			$row->year				= date('Y', strtotime($day));
	    			$row->month				= date('m', strtotime($day));
	    			$row->day				= date('d', strtotime($day));
	    			$row->hour				= date('H', strtotime($day));
	    			$row->minute			= date('i', strtotime($day));
	    			$row->second			= date('s', strtotime($day));
	    			$row->week				= date('W', strtotime($day));
	    			$row->level 			= $level;
	    			
	    			$row->save();
	    			
	    			$previousDay = $day;
	    			$i++;
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