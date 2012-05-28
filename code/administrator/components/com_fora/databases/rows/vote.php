<?php
class ComForaDatabaseRowVote extends KDatabaseRowDefault
{
    public function save()
    {
        $this->user_id = JFactory::getUser()->id;
        
        return parent::save();
    }
}