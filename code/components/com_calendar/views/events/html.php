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
        $date = $model->getState()->date;
        
        switch($this->getLayout()) {
            case 'month':
                $navigation = 'month';
                $days = $this->getService('com://admin/calendar.model.days')
                    ->year(date('Y', strtotime($date)))
                    ->month(date('m', strtotime($date)))
                    ->getList();
                break;
            default:
                $navigation = 'day';
                $days = $this->getService('com://admin/calendar.model.days')
                    ->year(date('Y', strtotime($date)))
                    ->getList();
        }
        
        $this->assign('days', $days);
        $this->assign('navigation', $navigation);
        $this->assign('today', date("Ymd"));
                
        return parent::display();
    }
}