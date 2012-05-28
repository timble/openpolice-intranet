<?php
class ComForaControllerBehaviorExecutable extends ComDefaultControllerBehaviorExecutable
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
                // Get is not allowed if topic is disabled.
                $topic = $this->getService('com://site/fora.model.topics')
                    ->id($this->getModel()->getItem()->relation->row)
                    ->getItem();
                
                if(!$topic->enabled) {
                    return false;
                }
                
                // Get is not allowed if forum is disabled.
                $forum = $this->getService('com://site/fora.model.forums')
                    ->id($topic->fora_forum_id)
                    ->getItem();
                
                if(!$forum->enabled) {
                    return false;
                }
                
                // Get is not allowed if category is disabled.
                $category = $this->getService('com://site/fora.model.categories')
                    ->id($forum->fora_category_id)
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
            
            case 'topic':
                // Read is not allowed if forum is disabled.
                $forum = $this->getService('com://site/fora.model.forums')
                    ->id($this->getModel()->getItem()->id)
                    ->getItem();
                
                if(!$forum->enabled) {
                    return false;
                }
                
                // Read is not allowed if category is disabled.
                $category = $this->getService('com://site/fora.model.categories')
                    ->id($forum->fora_category_id)
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
                // Browse is not allowed if view is not topic or comment.
                $view = KRequest::get('get.view', 'cmd');
                
                return $view == 'topic' || $view == 'comment';
                
            case 'category':
                // Browse is allowed.
                return true;
            
            case 'comment':
                $view = KRequest::get('get.view', 'cmd');
                
                // Browse is not allowed if request is not coming from topic view.
                return $view == 'topic';
                
            case 'topic':
                // Browse is not allowed if forum is disabled.
                $forum = $this->getService('com://site/fora.model.forums')
                    ->id($this->getModel()->getItem()->id)
                    ->getItem();
                
                if(!$forum->enabled) {
                    return false;
                }
                
                // Browse is not allowed if category is disabled.
                $category = $this->getService('com://site/fora.model.categories')
                    ->id($forum->fora_category_id)
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
                // Add is not allowed if view is not topic or comment.
                $view = KRequest::get('get.view', 'cmd');
                
                return $view == 'topic' || $view == 'comment';
                
            case 'comment':
                $request = KRequest::get('post', 'cmd');
                
                // Add is not allowed if table is not "fora_topics".
                if($request['table'] != 'fora_topics') {
                    return false;
                }
                
                // Add is not allowed if topic is disabled or not commentable.
                $topic = $this->getService('com://site/fora.model.topics')
                    ->id($request['row'])
                    ->getItem();
                    
                if(!$topic->enabled || !$topic->commentable) {
                    return false;
                }
                
                // Add is not allowed if forum is disabled or closed..
                $forum = $this->getService('com://site/fora.model.forums')
                    ->id($topic->fora_forum_id)
                    ->getItem();
                
                if(!$forum->enabled || !$forum->open) {
                    return false;
                }
                
                // Add is not allowed if category is disabled.
                $category = $this->getService('com://site/fora.model.categories')
                    ->id($forum->fora_category_id)
                    ->getItem();
                
                return (bool) $category->enabled;
            
            case 'subscription':
                // Add is not allowed if user_id is not the current user's id.
                return KRequest::get('post.user_id', 'int') == JFactory::getUser()->id;
                
            case 'topic':
                // Add is not allowed if forum is disabled or closed.
                $forum = $this->getService('com://site/fora.model.forums')
                    ->id($this->getModel()->getItem()->fora_forum_id)
                    ->getItem();
                
                if(!$forum->enabled || !$forum->open) {
                    return false;
                }
                
                // Add is not allowed if category is disabled.
                $category = $this->getService('com://site/fora.model.categories')
                    ->id($forum->fora_category_id)
                    ->getItem();
                
                return (bool) $category->enabled;
                
            case 'vote':
                return true;
                
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
                
            case 'topic':
                // Edit is not allowed if the user is not the creator of the topic.
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
            
            case 'vote':
                return true;
                
            default:
                return false;
        }
    }
    
    protected function _basicCheck()
    {
        $user = JFactory::getUser();
        
        // Not allowed for quests.
        if($user->guest) {
            return false;
        }
        
        // Allowed for agents.
        if($user->gid > 18) {
            return true;
        }
    }
}
