<?php
class ComCommentsDatabaseRowComment extends KDatabaseRowDefault
{
    public function save()
    {
        if($this->isNew()) {
            $this->created_by = null;
        }
        
        return parent::save();
    }
}