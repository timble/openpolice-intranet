<?php
class ComNewsDispatcher extends ComDefaultDispatcher
{
    public function __construct(KConfigInterface $config)
    {
        parent::__construct($config);
        
        if (KRequest::type() == 'AJAX' && KRequest::method() == 'POST') {
            $this->unregisterCallback('after.dispatch', array($this, 'forward'));
        }
    }
}
