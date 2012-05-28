<?php
class ComForaDatabaseBehaviorCreatable extends KDatabaseBehaviorCreatable
{
    protected function _beforeTableInsert(KCommandContext $context)
    {
        if ($this->getMixer()->getIdentifier()->name == 'topic' && !$this->enabled) {
            $this->created_by = (int) JFactory::getUser()->id;
            
            return;
        }
        
        parent::_beforeTableInsert($context);
    }
    
    protected function _beforeTableUpdate(KCommandContext $context)
    {
        if ($this->getMixer()->getIdentifier()->name == 'topic' && !((int) $this->created_on) && $this->enabled) {
            $this->created_on = gmdate('Y-m-d H:i:s');
        }
    }
}