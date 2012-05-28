<?php
class ComForaViewTopicHtml extends ComDefaultViewHtml
{
    public function display()
    {
        $categories = $this->getService('com://admin/fora.model.categories')
            ->getList();
        $this->assign('categories', $categories);
        
        $forums = $this->getService('com://admin/fora.model.forums')
            ->getList();
        $this->assign('forums', $forums);

        return parent::display();
    }
}