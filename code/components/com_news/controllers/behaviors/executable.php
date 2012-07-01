<?php
class ComNewsControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
{
    public function canGet()
    {
        // TODO: Fix memory issue when false is returned.
        if(is_bool($result = $this->_basicCheck())) {
            return $result;
        }
                
        switch($this->getMixer()->getIdentifier()->name)
        {
            case 'attachment':
                // Get is not allowed if article is disabled.
                $article = $this->getService('com://site/news.model.articles')
                    ->id($this->getModel()->getItem()->relation->row)
                    ->getItem();
                
                if(!$article->enabled) {
                    return false;
                }
                
                // Get is not allowed if category is disabled.
                $category = $this->getService('com://site/news.model.categories')
                    ->id($article->news_category_id)
                    ->getItem();
                
                return (bool) $category->enabled;
        }
    }
    
    public function canRead()
    {
        if(is_bool($result = $this->_basicCheck())) {
            return $result;
        }
        
        switch($this->getMixer()->getIdentifier()->name)
        {
            case 'category':                
                // Read is not allowed if category is disabled.
                return (bool) $this->getModel()->getItem()->enabled;
            
            case 'comment':
                switch ($this->getView()->getLayout()) {
                    case 'form':
                        // Read is allowed for anybody.
                        return true;
                    
                    default:
                        // Read is not allowed.
                        return false;
                }
            
            case 'article':
                // Read is not allowed if forum is disabled.
                $category = $this->getService('com://site/news.model.categories')
                    ->id($this->getModel()->getItem()->id)
                    ->getItem();

                return (bool) $category->enabled;
                
            default:
                return false;
        }
    }
    
    public function canBrowse()
    {
        if(is_bool($result = $this->_basicCheck())) {
            return $result;
        }
                
        switch($this->getMixer()->getIdentifier()->name)
        {
            case 'attachment':
                // Browse is not allowed if view is not article or comment.
                $view = KRequest::get('get.view', 'cmd');
                
                return $view == 'article' || $view == 'comment';
                
            case 'category':
                return true;
            
            case 'comment':
                $view = KRequest::get('get.view', 'cmd');
                
                // Browse is not allowed if request is not coming from article view.
                return $view == 'article';
                
            case 'article':
                // Browse is not allowed if category is disabled.
                $category = $this->getService('com://site/news.model.categories')
                    ->id($this->getModel()->getItem()->id)
                    ->getItem();
                    
                return (bool) $category->enabled;
                
            case 'activity':
            	return true;
            	
            default:
                return false;
        }
    }
    
    public function canAdd()
    {
        if(is_bool($result = $this->_basicCheck())) {
            return $result;
        }
        
        switch($this->getMixer()->getIdentifier()->name)
        {
            case 'attachment':
            case 'file':
                // Add is not allowed if view is not article or comment.
                $view = KRequest::get('get.view', 'cmd');
                
                return $view == 'article' || $view == 'comment';
                
            case 'comment':
                $request = KRequest::get('post', 'cmd');
                
                // Add is not allowed if table is not "news_articles".
                if($request['table'] != 'news_articles') {
                    return false;
                }
                
                // Add is not allowed if article is disabled or not commentable.
                $article = $this->getService('com://site/news.model.articles')
                    ->id($request['row'])
                    ->getItem();
                    
                if(!$article->enabled || !$article->commentable) {
                    return false;
                }
                
                // Add is not allowed if category is disabled.
                $category = $this->getService('com://site/news.model.categories')
                    ->id($article->news_category_id)
                    ->getItem();
                
                return (bool) $category->enabled;
            
            case 'subscription':
                // Add is not allowed if user_id is not the current user's id.
                return KRequest::get('post.user_id', 'int') == JFactory::getUser()->id;
                
            case 'article':
                // Add is not allowed if category is disabled.
                $category = $this->getService('com://site/news.model.categories')
                    ->id($this->getModel()->getItem()->news_category_id)
                    ->getItem();
                
                return (bool) $category->enabled;
                
            default:
                return false;
        }
    }

    public function canEdit()
    {
        if(is_bool($result = $this->_basicCheck())) {
            return $result;
        }
                        
        switch($this->getMixer()->getIdentifier()->name)
        {
            case 'comment':
                // Edit is not allowed if the user is not the creator of the comment.
                return JFactory::getUser()->id == $this->getModel()->getItem()->created_by;
                
            case 'article':
                // Edit is not allowed if the user is not the creator of the article.
                return JFactory::getUser()->id == $this->getModel()->getItem()->created_by;
            
            default:
                return false;
        }
    }
    
    public function canDelete()
    {
        if(is_bool($result = $this->_basicCheck())) {
            return $result;
        }
                        
        switch($this->getMixer()->getIdentifier()->name)
        {
            case 'subscription':
                // Delete is not allowed if user_id is not the current user's id.
                return KRequest::get('post.user_id', 'int') == JFactory::getUser()->id;                
            default:
                return false;
        }
    }
    
    protected function _basicCheck()
    {
        $user = JFactory::getUser();
        
        // Not allowed for quests.
        if($user->guest) {
            //return false;
        }
        
        // Allowed for agents.
        if($user->gid > 18) {
            return true;
        }
    }
}
