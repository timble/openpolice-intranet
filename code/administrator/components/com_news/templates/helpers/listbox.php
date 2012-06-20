<?php

class ComNewsTemplateHelperListbox extends ComDefaultTemplateHelperListbox
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

        $categories = $this->getService('com://admin/news.model.categories')
            ->getList();

        if($config->deselect) {
            $options[] = $this->option(array('text' => $config->prompt, 'value' => ''));
        }

        foreach($categories as $category)
        {
            $options[] = $this->option(array(
                'text'    => $category->title,
                'value'   => $category->id
            ));
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
	
	public function color( $config = array())
	{
	    $config = new KConfig($config);
	    $config->append(array(
	        'name'      => 'color',
	        'attribs'   => array(),
	        'deselect'  => true,
	        'prompt'    => '- Select -',
	    ))->append(array(
	        'selected'  => $config->{$config->name}
	    ));
	    
	    $options = array();
	    
	    $options[] = $this->option(array('text' => JText::_( 'None' ), 'value' => ''));
	    $options[] = $this->option(array('text' => JText::_( 'Earls Green' ), 'value' => 'earls-green'));
	    $options[] = $this->option(array('text' => JText::_( 'Bright Sun' ), 'value' => 'bright-sun'));
	    $options[] = $this->option(array('text' => JText::_( 'Sea Buckthorn' ), 'value' => 'sea-buckthorn'));
	    $options[] = $this->option(array('text' => JText::_( 'Paprika' ), 'value' => 'paprika'));
	    $options[] = $this->option(array('text' => JText::_( 'Green Vogue' ), 'value' => 'green-vogue'));
	    $options[] = $this->option(array('text' => JText::_( 'Pacific Blue' ), 'value' => 'pacific-blue'));
	    $options[] = $this->option(array('text' => JText::_( 'Orient' ), 'value' => 'orient'));
	    $options[] = $this->option(array('text' => JText::_( 'Tallow' ), 'value' => 'tallow'));
	    $options[] = $this->option(array('text' => JText::_( 'White Rock' ), 'value' => 'white-rock'));
	    $options[] = $this->option(array('text' => JText::_( 'Astra' ), 'value' => 'astra'));
	    $options[] = $this->option(array('text' => JText::_( 'Pomegranate' ), 'value' => 'pomegranate'));
	    $options[] = $this->option(array('text' => JText::_( 'Bossanova' ), 'value' => 'bossanova'));
	    $options[] = $this->option(array('text' => JText::_( 'Rose Bud' ), 'value' => 'rose-bud'));
	    $options[] = $this->option(array('text' => JText::_( 'Gothic' ), 'value' => 'gothic'));
	    $options[] = $this->option(array('text' => JText::_( 'Nebula' ), 'value' => 'nebula'));
	
	    //Add the options to the config object
	    $config->options = $options;
	    
	    return $this->optionlist($config);
	}
}