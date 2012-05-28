<?php
class ComForaViewCommentsHtml extends ComForaViewHtml
{
    public function display()
    {
        $model    = $this->getModel();
        $comments = $model->getList();
        
        $topic = $this->getService('com://site/fora.model.topics')
            ->id($model->get('row'))
            ->getItem();
        
        $forum = $this->getService('com://site/fora.model.forums')
            ->id($topic->fora_forum_id)
            ->getItem();
        
        $this->assign('forum', $forum);
        $this->assign('topic', $topic);
        
        if($forum->type == 'question')
        {
            $answer = $this->getService('com://site/fora.database.table.comments')
                ->select(array('id' => $comments->getColumn('id')), KDatabase::FETCH_ROW);
            
            if(!$answer->isNew()) {
                $comments->find($answer->id)->answer = true;
            }
        }
        
        $attachments = $this->getService('com://admin/attachments.model.attachments')
            ->table('comments_comments')
            ->row($comments->getColumn('id'))
            ->getList();
            
        $this->assign('attachments', $attachments);
        
        $editor_settings = array(
            'height'							=> '150',
            'theme_advanced_statusbar_location' => 'none',
            'theme_advanced_buttons1'           => implode(',', array('bold', 'italic', 'strikethrough', 'underline', '|', 'bullist', 'numlist', 'blockquote', '|', 'link', 'unlink')),
			'theme_advanced_buttons2'           => '',
            'valid_elements'					=> implode(',', array('a[href]', 'b', 'blockquote', 'em', 'i', 'li', 'ol', 'p', 'span', 'strong', 'u', 'ul'))
        );
        
        $this->assign('editor_settings', $editor_settings);
        
        return parent::display();
    }
}