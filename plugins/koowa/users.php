<?php
class PlgKoowaUsers extends PlgKoowaDefault
{
    public function onBeforeDispatcherDispatch(KEvent $event)
    {
        $controller = $event->caller->getController();
        if($controller->getIdentifier() == 'com://site/users.controller.login' && !JFactory::getUser()->guest)
        {
            $menu   = JSite::getMenu();
            $params = $menu->getParams($menu->getActive()->id);

            if($params->get('login')) {
                JFactory::getApplication()->redirect(JRoute::_($params->get('login')));
            }
        }
    }
}