<?php
class ComForaModelCategories extends ComDefaultModelDefault
{
    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->_state
            ->insert('published', 'boolean')
            ->insert('product', 'int');
    }
    
    protected function _buildQueryJoins(KDatabaseQuery $query)
    {
        $state = $this->_state;
        
        if(!$state->isUnique())
        {
            if(!is_null($state->product))
            {
                $ids = !empty($state->product) ? implode(',', (array) $state->product) : 0;
                
                $query->join('RIGHT', 'fora_categories_products AS product',
                	'product.fora_category_id = tbl.fora_category_id AND product.subscriptions_product_id IN ('.$ids.')');
            }
        }
    }
    
    protected function _buildQueryWhere(KDatabaseQuery $query)
    {
        $state = $this->_state;
        
        if(!$state->isUnique())
        {
            if(is_bool($state->published)) {
                $query->where('tbl.enabled', '=', (int) $state->published);
            }
        }
        
        parent::_buildQueryWhere($query);
    }
}