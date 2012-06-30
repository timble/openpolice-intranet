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
            ->year(date('Y', strtotime($model->getState()->date)))
            ->month(date('m', strtotime($model->getState()->date)))
            ->getList();
         
         $this->assign('days', $days);
         $this->assign('today', date("Ymd"));
                
        return parent::display();
    }
}