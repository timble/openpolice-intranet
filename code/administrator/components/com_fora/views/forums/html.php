<?php
class ComForaViewForumsHtml extends ComDefaultViewHtml
{
    public function display()
    {
        $categories = $this->getService('com://admin/fora.model.categories')
            ->getList();
        
        $this->assign('categories', $categories);
        
        return parent::display();
    }
}