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
            ->month('6')
            ->getList();
         
         $this->assign('days', $days);
         $this->assign('today', date("d.m.y"));
                
        return parent::display();
    }
}