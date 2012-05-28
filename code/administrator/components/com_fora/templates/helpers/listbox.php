<?php
class ComForaTemplateHelperListbox extends ComDefaultTemplateHelperListbox
{
    public function categories(array $config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'name'         => 'category',
            'filter'       => array(),
            'unselectable' => array(),
            'root'         => false,
            'deselect'     => true,
            'prompt'       => '- Select -'
        ));

        if(!($config->unselectable instanceof KConfig)) {
            $config->unselectable = (array) $config->unselectable;
        }

        $categories = $this->getService('com://admin/fora.model.categories')
            ->set($config->filter)
            ->getList();

        if($config->deselect) {
            $options[] = $this->option(array('text' => $config->prompt, 'value' => ''));
        }

        if($config->root) {
            $options[] = $this->option(array('text' => JText::_('Root'), 'value' => 1));
        }

        foreach($categories as $category)
        {
            $options[] = $this->option(array(
                'text'    => ($config->level ? '' : str_repeat('&nbsp;', ($category->level - 1) * 4)) . $category->title,
                'value'   => $category->id,
                'attribs' => in_array($category->level, $config->unselectable->toArray()) ? array('disabled' => 'disabled') : null
            ));
        }

        $config->options = $options;

        return $this->optionlist($config);
    }

    public function types(array $config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'name'     => 'type',
            'deselect' => true,
            'prompt'   => '- Select -'
        ));

        if($config->deselect) {
            $options[] = $this->option(array('text' => $config->prompt, 'value' => ''));
        }

        $list = array('article', 'idea', 'question');

        foreach($list as $item) {
            $options[] = $this->option(array('text' => JText::_(ucfirst($item)), 'value' => $item));
        }

        $config->options = $options;

        return $this->optionlist($config);
    }
    
    public function statuses(array $config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'name'     => 'status',
            'deselect' => true,
            'prompt'   => '- Select -'
        ));
        
        if($config->deselect) {
            $options[] = $this->option(array('text' => $config->prompt, 'value' => ''));
        }

        $list = array('accepted', 'done', 'not planned');

        foreach($list as $item) {
            $options[] = $this->option(array('text' => JText::_(ucfirst($item)), 'value' => $item));
        }

        $config->options = $options;

        return $this->optionlist($config);
    }
    
    public function creatable_by(array $config = array())
    {
        $config = new KConfig($config);
        $config->append(array(
            'name'     => 'creatable_by',
            'deselect' => true,
            'prompt'   => '- Select -'
        ));
        
        if($config->deselect) {
            $options[] = $this->option(array('text' => $config->prompt, 'value' => ''));
        }

        $list = array('users', 'agents');

        foreach($list as $item) {
            $options[] = $this->option(array('text' => JText::_(ucfirst($item)), 'value' => $item));
        }

        $config->options = $options;

        return $this->optionlist($config);
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
    
    public function radiolist( $config = array())
    {
		$config = new KConfig($config);
		$config->append(array(
			'list' 		=> null,
			'name'   	=> 'id',
			'attribs'	=> array(),
			'key'		=> 'id',
			'text'		=> 'title',
			'selected'	=> null,
			'translate'	=> false
		));
		
		$name    = $config->name;
		$attribs = KHelperArray::toString($config->attribs);

		$html = array();
		foreach($config->list as $row)
		{
			$key  = $row->{$config->key};
			$text = $config->translate ? JText::_( $row->{$config->text} ) : $row->{$config->text};
			$id	  = isset($row->id) ? $row->id : null;

			$extra = '';
			
			if ($config->selected instanceof KConfig)
			{
				foreach ($config->selected as $value)
				{
					$sel = is_object( $value ) ? $value->{$config->key} : $value;
					if ($key == $sel)
					{
						$extra .= 'selected="selected"';
						break;
					}
				}
			} 
			else $extra .= ($key == $config->selected ? 'checked="checked"' : '');
				
			$html[] = '<label class="radio" for="'.$name.$id.'">'.$text;
			$html[] = '<input type="radio" name="'.$name.'" id="'.$name.$id.'" value="'.$key.'" '.$extra.' '.$attribs.' />';
			$html[] = '</label>';
		}

		return implode(PHP_EOL, $html);
    }
}
