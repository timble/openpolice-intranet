<?php
class ComNewsViewArticlesHtml extends ComDefaultViewHtml
{
    public function display()
    {
        $categories = $this->getService('com://admin/news.model.categories')
            ->getList();
        $this->assign('categories', $categories);

        return parent::display();
    }
}
