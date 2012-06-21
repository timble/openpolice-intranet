<?php
class ComNewsTemplateHelperSelect extends KTemplateHelperSelect
{
	public function booleanswitch( $config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'false'		=> 'No',
			'true'		=> 'Yes',
			'name'   	=> 'id',
			'text'		=> 'title',
			'selected'	=> false,
			'translate'	=> false
		));
		
		$html = array();
		
		if(!isset($this->_loaded['switcher']))
		{
			JHTML::_('behavior.mootools', false);
			$html[] = '<script src="media://com_news/js/switch.js" />';
			$html[] = '<style src="media://com_news/css/switch.css" />';
			
			$this->_loaded['switcher'] = true;
		}
		
		$name = $config->name;
		
		$html[] = '<p class="field switch">';
		
		$html[] = '<input type="radio" name="'.$name.'" id="'.$name.'1" value="1" '.($config->selected ? 'checked="checked"' : '').' />';
		$html[] = '<input type="radio" name="'.$name.'" id="'.$name.'0" value="0" '.(!$config->selected ? 'checked="checked"' : '').' />';
		
		$false  = $config->translate ? JText::_( $config->false ) : $config->false;
		$true  = $config->translate ? JText::_( $config->true ) : $config->true;
		
		$html[] = '<label for="'.$name.'0" class="cb-enable'.($config->selected ? ' selected' : '').'"><span>'.$true.'</span></label>';
		$html[] = '<label for="'.$name.'1" class="cb-disable'.(!$config->selected ? ' selected' : '').'"><span>'.$false.'</span></label>';
		
		$html[] = '</p>';
		
		return implode(PHP_EOL, $html);
	}
}