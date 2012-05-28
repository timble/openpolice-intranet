<?php
class PlgKoowaAssembla extends PlgKoowaDefault
{
    public function onBeforeDispatcherDispatch(KEvent $event)
    {
        $request = $event->caller->getRequest();
        
        if($request->option = 'com_settings' && $request->view == 'settings') {
            $event->caller->getController()->addBehavior('com://admin/assembla.controller.behavior.settingsable');
        }
    }
}