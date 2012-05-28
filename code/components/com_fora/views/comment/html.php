<?php
class ComForaViewCommentHtml extends ComForaViewHtml
{
    public function display()
    {
        $editor_settings = array(
            'height'							=> '150',
            'theme_advanced_statusbar_location' => 'none',
            'theme_advanced_buttons1'           => 'bold,italic,strikethrough,underline,|,bullist,numlist,blockquote,|,link,unlink',
			'theme_advanced_buttons2'           => '',
            'valid_elements'					=> 'a[href],b,blockquote,em,i,li,ol,p,span,strong,u,ul'
        );
        
        $this->assign('editor_settings', $editor_settings);
        
        $comment = $this->getModel()->getItem();
        if (!$comment->isNew() && $comment->isAttachable()) {
            $this->assign('attachments', $comment->getAttachments());
        }
        
        return parent::display();
    }
}