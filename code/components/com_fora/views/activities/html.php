<?php
class ComForaViewActivitiesHtml extends ComForaViewHtml
{    
    public function display()
    {
        $categories = $this->getService('com://site/fora.model.categories')
            ->getList();

        $this->assign('categories', $categories);
        
                
        return parent::display();
    }
}