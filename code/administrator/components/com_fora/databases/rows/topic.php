<?php
class ComForaDatabaseRowTopic extends KDatabaseRowDefault
{
    public function save()
    {
        if($this->isModified('text') && JFactory::getUser()->gid == 18) {
            $this->text = strip_tags($this->text, '<a><b><blockquote><em><i><li><ol><p><span><strong><u><ul>');
        }
        
        return parent::save();
    }
}