<?php
class ComForaViewCategoriesHtml extends ComForaViewHtml
{
    public function display()
    {
        $forums = $this->getService('com://site/fora.model.forums')
            ->getList();
        
        $this->assign('forums', $forums);
        
        $topics = $this->getService('com://site/fora.model.topics')
            ->latest(3)
            ->getList();
        
        $this->assign('topics', $topics);
        
        $table = $this->getService('com://admin/fora.database.table.topics');
        $query = $table->getDatabase()->getQuery()
            ->select(array('fora_forum_id AS fora_topic_id')) // TODO: Remove this identity column hack.
            ->select(array('fora_forum_id', 'COUNT(*) AS count'))
            ->from('fora_topics')
            ->group('fora_forum_id');
        
        $topics_count = $table->select($query);
        $this->assign('topics_count', $topics_count);
        
        switch ($this->getLayout()) {
        	case 'select':
        		$topic = $this->getService('com://site/fora.model.topics')
			        		->id(KRequest::get('get.topic', 'int'))
			        		->getItem();
        		$this->assign('topic', $topic);
        		break;
        }
        
        return parent::display();
    }
}