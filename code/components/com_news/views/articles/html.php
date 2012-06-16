<?php
class ComNewsViewArticlesHtml extends ComNewsViewHtml
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
                
        $document = JFactory::getDocument();
        
        $parts = array();
        if($model->getState()->subscribed)
        {
        	$parts[] = JText::_('My Articles');
        }
        
        if($model->getState()->category)
        {
	        $category = $this->getService('com://site/news.model.categories')
	        				->id($model->getState()->category)
	        				->getItem();
	        
	        $parts[] = $category->title;
        }
        
        if(count($parts)) {
        	$document->setTitle(implode(': ', $parts));
        }
        
        if($model->getState()->search)
        {
        	$document->setTitle(JText::_('Article Search') . ': '. $model->getState()->search);
        }
        elseif(!$model->getState()->subscribed && !$model->getState()->category) {
        	$document->setTitle(JText::_('Articles'));
        }

        return parent::display();
    }
}