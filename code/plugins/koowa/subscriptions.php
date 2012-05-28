<?php
class PlgKoowaSubscriptions extends PlgKoowaDefault
{
    public function onBeforeDispatcherDispatch(KEvent $event)
    {
        $controller = $event->caller->getController();
        
        if ($controller->getIdentifier() == 'com://admin/settings.controller.setting') {
            $controller->addBehavior('com://admin/subscriptions.controller.behavior.settingsable');
        }
    }
}