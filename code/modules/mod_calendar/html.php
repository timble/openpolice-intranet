<?php
 
class ModCalendarHtml extends ModDefaultHtml
{   
    public function display()
    {        
        // Module parameters
        $model = $this->getService('com://site/calendar.model.events')
                    ->sort('start_date')
                    ->limit('5');
               
	    // Assign vars and render view
		$this->assign('events', $model->getList());    
         
        return parent::display();
    }
} 