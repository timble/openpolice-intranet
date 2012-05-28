<?php
class ComForaDispatcher extends ComDefaultDispatcher
{
    protected function _initialize(KConfig $config)
    {
        // TODO: Remove this workaround if SEF bug was fixed.
        if (KRequest::get('get.view', 'cmd', 'fora') == 'fora') {
            JFactory::getApplication()->redirect('index.php?option=com_fora&view=topics');
        }
        
        parent::_initialize($config);
    }
}
