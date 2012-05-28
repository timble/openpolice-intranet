<?php
class ComNewsModelArticles extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);
        
        $this->_state
            ->insert('enabled', 'int')
            ->insert('category', 'int');
    }
    
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;

        if(!$state->isUnique())
        {
            if($state->enabled) {
                $query->where('tbl.enabled', '=', (int) $state->enabled);
            }
            
            if($state->category) {
                $query->where('tbl.news_category_id', '=', $state->category);
            }
        }
        
        parent::_buildQueryWhere($query);
    }
}