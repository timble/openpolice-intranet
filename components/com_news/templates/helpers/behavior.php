<?php

class ComNewsTemplateHelperBehavior extends ComDefaultTemplateHelperBehavior
{	
	/**
	 * Loads the calendar behavior and attaches it to a specified element
	 *
	 * @return string	The html output
	 */
    public function calendar($config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'date'	  => gmdate("M d Y H:i:s"),
		    'name'    => '',
		    'format'  => '%Y-%m-%d %H:%M:%S',
		    'attribs' => array('size' => 25, 'maxlenght' => 19),
		    'gmt_offset' => JFactory::getConfig()->getValue('config.offset') * 3600
 		));
 
        if($config->date && $config->date != '0000-00-00 00:00:00' && $config->date != '0000-00-00') { 
            $config->date = strftime($config->format, strtotime($config->date) /*+ $config->gmt_offset*/);
        }
        else $config->date = '';
        
	    $html = '';
		// Load the necessary files if they haven't yet been loaded
		if (!isset(self::$_loaded['calendar']))
		{
			$html .= '<script src="media://lib_koowa/js/calendar.js" />';
			$html .= '<script src="media://lib_koowa/js/calendar-setup.js" />';
			$html .= '<style src="media://lib_koowa/css/calendar.css" />';
			
			$html .= '<script>'.$this->_calendarTranslation().'</script>';

			self::$_loaded['calendar'] = true;
		}
	   
		$html .= "<script>
					window.addEvent('domready', function() {Calendar.setup({
        				inputField     :    '".$config->name."',     	 
        				ifFormat       :    '".$config->format."',   
        				button         :    'button-".$config->name."', 
        				align          :    'Tl',
        				singleClick    :    true,
        				showsTime	   :    false
    				});});
    			</script>";
		
		$attribs = KHelperArray::toString($config->attribs);
		
		
   		$html .= '<input type="text" name="'.$config->name.'" id="'.$config->name.'" value="'.$config->date.'" '.$attribs.' />';
		$html .= '<a class="btn" id="button-'.$config->name.'" /><i class="icon-calendar"></i></a>';
		
		
		return $html;
	}
}