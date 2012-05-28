<?php
class ComForaDatabaseBehaviorOrderable extends KDatabaseBehaviorOrderable
{
    public function _buildQueryWhere(KDatabaseQuery $query)
    {
        if($this->getMixer()->getIdentifier()->name == 'forum') {
            $query->where('fora_category_id', '=', $this->fora_category_id);
        }
    }
}