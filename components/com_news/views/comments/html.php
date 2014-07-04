<?php
class ComNewsViewCommentsHtml extends ComNewsViewHtml
{
    public function display()
    {
        $model    = $this->getModel();
        $comments = $model->getList();
        
        $article = $this->getService('com://admin/news.model.articles')
            ->id($model->get('row'))
            ->getItem();
                
        $attachments = $this->getService('com://admin/news.model.attachments')
            ->table('comments_comments')
            ->row($comments->getColumn('id'))
            ->getList();
            
        $this->assign('article', $article);
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