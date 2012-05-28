<?php
class ComForaViewTopicsHtml extends ComForaViewHtml
{
	protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'template_filters' => array('module'),
        ));

        parent::_initialize($config);
    }
    
    public function display()
    {
        $model = $this->getModel();
        
        // Assign category.
        if($model->category) {
            $category = $this->getService('com://site/fora.model.categories')
                ->id($model->category)
                ->getItem();

            $this->assign('category', $category);
        }
        
        // Assign forum.
        if($model->forum)
        {
            $forum = $this->getService('com://site/fora.model.forums')
                ->id($model->forum)
                ->getItem();
            
            $this->assign('forum', $forum);
            
            $category = $this->getService('com://site/fora.model.categories')
                ->id($forum->fora_category_id)
                ->getItem();
            
            $this->assign('category', $category);
        }
        
        // Assign subscribtion information.
        if(!$model->search && $model->forum)
        {
            $user = JFactory::getUser();
            if($forum->subscribable || $user->gid > 18)
            {
                $subscription = $this->getService('com://admin/fora.database.table.subscriptions')
                    ->select(array('type' => 'forum', 'row' => $forum->id, 'user_id' => $user->id), KDatabase::FETCH_ROW);
                $this->assign('subscribed', !$subscription->isNew());
            }
        }
        
        // Create pathway and set document title
        $document = JFactory::getDocument();
        $pathway = JFactory::getApplication()->getPathway();
        
        if($model->search)
        {
            if($model->category || $model->forum) {
                $pathway->addItem($this->escape($category->title), $this->createRoute('view=category&id='.$category->id.'&slug='.$category->slug));
            }
            
            if($model->forum) {
                $pathway->addItem($this->escape($forum->title), $this->createRoute('view=topics&id='.$forum->id.'&slug='.$forum->slug));
            }
            
            $pathway->addItem(JText::_('Search'));
            
            $document->setTitle(JText::_('Search forums'));
        }
        else
        {
            $pathway->addItem($this->escape($category->title), $this->createRoute('view=category&id='.$category->id.'&slug='.$category->slug));
            $pathway->addItem($this->escape($forum->title));
            
            $document->setTitle(JText::_($category->title . ': ' . $forum->title));
        }
        
        return parent::display();
    }
}