<?php

class ComNewsTemplateHelperListbox extends ComDefaultTemplateHelperListbox
{
	public function category( $config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'identifier'  => 'com://admin/news.model.categories',
			'name' 		=> 'category',
			'value'		=> 'id',
			'text'		=> 'title'
		));

		return parent::_listbox($config);
	}
	
	public function booleanlist( $config = array())
	{
		$config = new KConfig($config);
		$config->append(array(
			'name'   	=> '',
			'attribs'	=> array(),
			'true'		=> 'yes',
			'false'		=> 'no',
			'selected'	=> null,
			'translate'	=> true
		));
		
		$name    = $config->name;
		$attribs = KHelperArray::toString($config->attribs);
		
		$html  = array();
		
		$extra = !$config->selected ? 'checked="checked"' : '';
		$text  = $config->translate ? JText::_( $config->false ) : $config->false;
		
		$html[] = '<label class="radio" for="'.$name.'0">';
		$html[] = '<input type="radio" name="'.$name.'" id="'.$name.'0" value="0" '.$extra.' '.$attribs.' />';
		$html[] = '<span>'.$text.'</span>';
		$html[] = '</label>';
		
		$extra = $config->selected ? 'checked="checked"' : '';
		$text  = $config->translate ? JText::_( $config->true ) : $config->true;
		
		$html[] = '<label class="radio" for="'.$name.'1">';
		$html[] = '<input type="radio" name="'.$name.'" id="'.$name.'1" value="1" '.$extra.' '.$attribs.' />';
		$html[] = '<span>'.$text.'</span>';
		$html[] = '</label>';
		
		return implode(PHP_EOL, $html);
	}
}