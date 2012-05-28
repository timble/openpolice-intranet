<?php
class ComForaModelTopics extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->_state
            ->insert('published', 'int')
            ->insert('category', 'int')
            ->insert('forum', 'int')
            ->insert('latest', 'int');
    }

    protected function _buildQueryJoins(KDatabaseQuery $query)
    {
        $state = $this->_state;

        if(!$state->isUnique())
        {
            if($state->latest) {
                $query->join('LEFT OUTER', $this->getTable()->getName().' AS tbl_helper', 'tbl.fora_forum_id = tbl_helper.fora_forum_id AND tbl.created_on < tbl_helper.created_on');
            }
        }
    }

    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;

        if(!$state->isUnique())
        {
            if($state->published) {
                $query->where('tbl.enabled', '=', (int) $state->published);
            }
            
            if($state->search)
            {
                $query
                    ->where('(', null, null, 'AND')
                    ->where('tbl.title', 'LIKE', '%'.$state->search.'%', '')
                    ->where('tbl.text', 'LIKE', '%'.$state->search.'%', 'OR')
                    ->where(')', null, null, '');
            }
            
            if($state->category)
            {
                $forums = $this->getService('com://admin/fora.model.forums')
                    ->category($state->category)
                    ->getList();
                
                if(count($forums)) {
                    $query->where('tbl.fora_forum_id', 'IN', $forums->getColumn('id'));
                }
            }
            
            if($state->forum) {
                $query->where('tbl.fora_forum_id', 'IN', $state->forum);
            }
        }
        
        parent::_buildQueryWhere($query);
    }

    protected function _buildQueryGroup(KDatabaseQuery $query)
    {
        $state = $this->_state;

        if(!$state->isUnique())
        {
            if($state->latest) {
                $query->group('tbl.fora_topic_id');
            }
        }
    }

    protected function _buildQueryHaving(KDatabaseQuery $query)
    {
        $state = $this->_state;

        if(!$state->isUnique())
        {
            if($state->latest) {
                $query->having('COUNT(*) < '.$state->latest);
            }
        }
    }

    protected function _buildQueryOrder(KDatabaseQuery $query)
    {
        if($this->_state->latest) {
            $query->order('tbl.created_on', 'DESC');
        } else {
            parent::_buildQueryOrder($query);
        }
    }
}
