<?php
class ComForaControllerForum extends ComDefaultControllerDefault
{
    protected function _actionBrowse(KCommandContext $context)
    {
        if(JFactory::getUser()->gid == 18) {
            $this->getModel()->published = true;
        }
        
        return parent::_actionBrowse($context);
    }
}