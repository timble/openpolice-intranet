<?php
class ComNewsDispatcher extends ComDefaultDispatcher
{
    protected function _initialize(KConfig $config)
    {
        // TODO: Remove this workaround if SEF bug was fixed.
        if (KRequest::get('get.view', 'cmd', 'news') == 'news') {
            JFactory::getApplication()->redirect('index.php?option=com_news&view=articles');
        }
        
        parent::_initialize($config);
    }
}
