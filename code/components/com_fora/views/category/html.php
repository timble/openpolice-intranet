<?php
class ComForaViewCategoryHtml extends ComForaViewHtml
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
        
        $pathway = JFactory::getApplication()->getPathway();
        $pathway->addItem($this->escape($this->getModel()->getItem()->title));
        
        $document = JFactory::getDocument();
        $document->setTitle(JText::_('Forums') . ': '. $this->getModel()->getItem()->title);
        
        return parent::display();
    }
}