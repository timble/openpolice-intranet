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
        
        $days = $this->getService('com://admin/calendar.model.days')
            ->year('2012')
            ->month('7')
            ->getList();
         
         $this->assign('days', $days);
         $this->assign('today', '27.07.12');
                
        return parent::display();
    }
}