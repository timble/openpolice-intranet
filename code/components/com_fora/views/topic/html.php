<?php
class ComForaViewTopicHtml extends ComForaViewHtml
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
        $topic = $model->getItem();
        
        $forum = $this->getService('com://site/fora.model.forums')
            ->id($topic->id ? $topic->fora_forum_id : $model->forum)
            ->getItem();

        $this->assign('forum', $forum);
        
        $category = $this->getService('com://admin/fora.database.table.categories')
                				->select($forum->fora_category_id, KDatabase::FETCH_ROW);
        
        if ($topic->id && $topic->isAttachable()) {
            $this->assign('attachments', $topic->getAttachments());
        }
        
        $document = JFactory::getDocument();
        
        $pathway = JFactory::getApplication()->getPathway();
        $pathway->addItem($this->escape($category->title), $this->createRoute('view=category&id='.$category->id.'&slug='.$category->slug));
        $pathway->addItem($this->escape($forum->title), $this->createRoute('view=topics&forum='.$forum->id.'&slug='.$forum->slug));
        
        switch ($this->getLayout()) {
            case 'form':
                if(JFactory::getUser()->gid == 18)
                {
                    $editor_settings = array(
                        'theme_advanced_statusbar_location' => 'none',
                        'theme_advanced_buttons1'           => 'bold,italic,strikethrough,underline,|,bullist,numlist,blockquote,|,link,unlink',
    					'theme_advanced_buttons2'           => '',
                		'valid_elements'					=> 'a[href],b,blockquote,em,i,li,ol,p,span,strong,u,ul'
                    );
                } else $editor_settings = array();
                $this->assign('editor_settings', $editor_settings);
                
                $title = $topic-> id ? $topic->title : JText::_('New') . ' ' . JText::_($forum->type);
                
                $pathway->addItem($title);
                $document->setTitle($title);
                break;
                
            default:
                $user = JFactory::getUser();
                
                $vote = $this->getService('com://site/fora.database.table.votes')
                    ->select(array('fora_topic_id' => $topic->id, 'user_id' => $user->id), KDatabase::FETCH_ROW);
                $this->assign('voted', !$vote->isNew());
                
                if ($topic->commentable) {
                    $subscription = $this->getService('com://admin/fora.database.table.subscriptions')
                        ->select(array('type' => 'topic', 'row' => $topic->id, 'user_id' => $user->id), KDatabase::FETCH_ROW);
                    $this->assign('subscribed', !$subscription->isNew());
                }
                
                $pathway->addItem($this->escape($topic->title));
                $document->setTitle($topic->title);
                break;
        }
        
        return parent::display();
    }
}