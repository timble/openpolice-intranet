<?php
class ComCalendarDispatcher extends ComDefaultDispatcher
{
    protected function _initialize(KConfig $config)
    {
        // TODO: Remove this workaround if SEF bug was fixed.
        if (KRequest::get('get.view', 'cmd', 'calendar') == 'calendar') {
            JFactory::getApplication()->redirect('index.php?option=com_calendar&view=events');
        }
        
        parent::_initialize($config);
    }
}
