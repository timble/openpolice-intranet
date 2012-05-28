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
}