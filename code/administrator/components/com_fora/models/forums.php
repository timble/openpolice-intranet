<?php
class ComForaModelForums extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->_state
            ->insert('published', 'int')
            ->insert('category', 'int');
    }
    
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;

        if(!$state->isUnique())
        {
            if($state->published) {
                $query->where('tbl.enabled', '=', (int) $state->published);
            }
            
            if($state->category) {
                $query->where('tbl.fora_category_id', '=', $state->category);
            }
        }
        
        parent::_buildQueryWhere($query);
    }
}