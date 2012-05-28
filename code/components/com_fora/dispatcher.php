<?php
class ComForaDispatcher extends ComDefaultDispatcher
{
    public function __construct(KConfigInterface $config)
    {
        parent::__construct($config);
        
        if (KRequest::type() == 'AJAX' && KRequest::method() == 'POST') {
            $this->unregisterCallback('after.dispatch', array($this, 'forward'));
        }
    }
    
    protected function _initialize(KConfigInterface $config) {
        $config->append(array(
            'controller' => 'category'
        ));

        parent::_initialize($config);
    }
}
