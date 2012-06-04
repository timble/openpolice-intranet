<?php
class ComForaDatabaseRowCategory extends KDatabaseRowDefault
{
    public function save()
    {
        $modified = $this->getModified();
        
        if($result = parent::save())
        {
            if(in_array('subscriptions_product_id', $modified))
            {
                foreach($this->products as $product)
                {
                    if(!in_array($product->id, $this->subscriptions_product_id)) {
                        $product->delete();
                    } else {
                        unset($this->subscriptions_product_id[$product->id]);
                    }
                }
                
                foreach($this->_data['subscriptions_product_id'] as $product)
                {
                    $row = $this->products->getRow(array(
                        'data' => array(
                        	'fora_category_id' => $this->id,
                            'subscriptions_product_id' => $product
                        )
                    ))->save();
                }
            }
        }
        
        return $result;
    }
    
    public function __get($name)
    {
        if($name == 'products' && !isset($this->_data['products']))
        {
            $this->_data['products'] = $this->getService('com://admin/fora.database.table.categories_products')
                ->select(array('fora_category_id' => (int) $this->id));
        }
        
        return parent::__get($name);
    }
}