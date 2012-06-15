<?php
class ComCalendarViewEventsHtml extends ComCalendarViewHtml
{
	protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'template_filters' => array('module'),
        ));

        parent::_initialize($config);
    }
    
    public function display()
    {
        $model = $this->getModel();        
                
        return parent::display();
    }
}