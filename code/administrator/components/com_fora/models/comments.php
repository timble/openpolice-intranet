<?php
class ComForaModelComments extends KModelTable
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->_state
            ->insert('row', 'int', null, true, array('answer'))
            ->insert('answer', 'boolean', null, true, array('row'));
    }
    
    /*protected function _buildQueryFrom($query)
    {
        if($this->_state->topic) {
            $query->from('comments_comments AS tbl');
        } else {
            parent::_buildQueryFrom($query);
        }
    }
    
    protected function _buildQueryJoin(KDatabaseQuery $query)
    {
        if($this->_state->topic) {
            $query->join('RIGHT', 'fora_comments AS fora_comments', 'fora_comments.comments_comment_id = tbl.comments_comment_id');
        }
    }*/
    
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;
        
        if($state->row) {
            $query->where('tbl.row', '=', $state->row);
        }
        
        if($state->answer) {
            $query->where('tbl.answer', '=', (int) $state->answer);
        }
                
        parent::_buildQueryWhere($query);
    }
}