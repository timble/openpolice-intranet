<?php

jimport('joomla.parameter.element');

class JElementCategories extends JElement
{
	public $_name = 'Categories';

	function fetchElement($name, $value, &$node, $control_name)
	{
		$key_field = $node->attributes('key_field');
		$attribs = array();
		$el_name = $control_name.'['.$name.']';

		return KService::get('com://admin/news.template.helper.listbox')->category(array(
			'name' => $el_name,
			'value' => $key_field ? $key_field : 'id',
			'deselect' => true,
			'showroot' => false,
			'selected' => $value,
			'attribs' => $attribs
		));
	}
}