<?php
class ComForaDatabaseBehaviorNotifiable extends KDatabaseBehaviorAbstract
{
    public function _afterTableSelect(KCommandContext $context)
    {
        $data = $context->data;
        
        if ($data instanceof KDatabaseRowTable && $data->getStatus() == KDatabase::STATUS_LOADED) {
            $subscription = $this->getService('com://admin/fora.database.row.subscription')
                ->setData(array(
                    'type'    => 'topic',
                    'row'     => $data->id,
                    'user_id' => JFactory::getUser()->id
                ));
            
            if ($subscription->load()) {
                $subscription->last_viewed_on = date_format(date_create(), 'Y-m-d H:i:s');
                $subscription->save();
            }
        }
    }
    
    protected function _afterTableInsert(KCommandContext $context)
    {
        $data = $context->data;
        $name = $this->getMixer()->getIdentifier()->name;
        
        if ($data->getStatus() == KDatabase::STATUS_CREATED && ($name == 'comment' || $name == 'topic' && $data->enabled)) {
            $this->_addSubscription($context);
            $this->_sendNotification($context);
            
        }
    }
    
    public function _afterTableUpdate(KCommandContext $context)
    {
        $data = $context->data;
        
        if ($data->getStatus() == KDatabase::STATUS_UPDATED && $data->isModified('enabled') && $data->enabled) {
            $this->_addSubscription($context);
            $this->_sendNotification($context);
        }
    }
    
    protected function _addSubscription(KCommandContext $context)
    {
        $data = $context->data;
        
        switch ($data->getIdentifier()->name) {
            case 'comment' :
                $topic = $this->getService('com://admin/fora.database.table.topics')
                    ->select($data->row, KDatabase::FETCH_ROW);
                break;
                
            case 'topic':
                $topic = $context->data;
                break;
        }
        
        if ($topic->commentable) {
            $subscription = $this->getService('com://admin/fora.database.row.subscription')
                ->setData(array(
                    'type'    => 'topic',
                    'row'     => $topic->id,
                    'user_id' => JFactory::getUser()->id
                ));
            
            if (!$subscription->load()) {
                $subscription->save();
            }
        }
    }
    
    protected function _sendNotification(KCommandContext $context)
    {
        $data = $context->data;
        
        switch ($data->getIdentifier()->name) {
            case 'comment':
                $subscriptions = $this->getService('com://admin/fora.database.table.subscriptions')
                    ->select(array(
                        'type' => 'topic',
                        'row'  => $data->row
                    ));
                
                foreach (clone $subscriptions as $subscription) {
                    if ($subscription->last_viewed_on >= $subscription->notification_sent_on && $subscription->user_id != JFactory::getUser()->id) {
                        $subscription->notification_sent_on = date_format(date_create(), 'Y-m-d H:i:s');
                    } else {
                        $subscriptions->extract($subscription);
                    }
                }
                
                if (count($subscriptions)) {
                    $topic = $this->getService('com://admin/fora.database.table.topics')
                        ->select($data->row, KDatabase::FETCH_ROW);
                    
                    $parts = (object) array(
                        'subject'    => 'New Comment Notification',
                        'body_html'  => file_get_contents(JPATH_COMPONENT_SITE.'/views/notification/tmpl/comment_html.php'),
                        'body_plain' => file_get_contents(JPATH_COMPONENT_SITE.'/views/notification/tmpl/comment_plain.php'),
                        'fields'     => array(
                            '{{SUBJECT}}'      => 'New Comment Notification',
                            '{{TOPIC_TITLE}}'  => $topic->title,
                            '{{TOPIC_LINK}}'   => JURI::base().substr(JRoute::_('index.php?option=com_fora&view=topic&id='.$topic->id.'#comment-'.$data->id), strlen(JURI::base(true)) + 1)
                        )
                    );
                }
                break;
                
            case 'topic':
                $subscriptions = $this->getService('com://admin/fora.database.table.subscriptions')
                    ->select(array(
                        'type' => 'forum',
                        'row'  => $data->fora_forum_id
                    ));
                
                if (count($subscription = $subscriptions->find(array('user_id' => JFactory::getUser()->id)))) {
                    $subscriptions->extract($subscription->top());
                    unset($subscription);
                }
                
                if (count($subscriptions)) {
                    $forum = $this->getService('com://admin/fora.database.table.forums')
                        ->select($data->fora_forum_id, KDatabase::FETCH_ROW);
                    
                    $parts = (object) array(
                        'subject'    => 'New Topic Notification',
                        'body_html'  => file_get_contents(JPATH_COMPONENT_SITE.'/views/notification/tmpl/topic_html.php'),
                        'body_plain' => file_get_contents(JPATH_COMPONENT_SITE.'/views/notification/tmpl/topic_plain.php'),
                        'fields'     => array(
                            '{{SUBJECT}}'     => 'New Topic Notification',
                            '{{TOPIC_TITLE}}' => $data->title,
                            '{{TOPIC_LINK}}'  => JURI::base().substr(JRoute::_('index.php?option=com_fora&view=topic&id='.$data->id), strlen(JURI::base(true)) + 1),
                            '{{FORUM_TITLE}}' => $forum->title
                        )
                    );
                }
                break;
        }
        
        if (count($subscriptions)) {
            $users = $this->getService('com://admin/users.database.table.users')
                ->select(array_values($subscriptions->getColumn('user_id')));
            
            $mail = $this->getService('com://admin/notifications.database.row.mail', array('method' => 'spool'))
                ->setSubject($parts->subject)
                ->setFrom(array('support@joomlatools.eu' => 'Joomlatools Support'))
                ->setBody($parts->body_html, 'text/html')
                ->addPart($parts->body_plain, 'text/plain');
            
            $mail->decorator(array_fill_keys($users->getColumn('email'), $parts->fields));
            
            foreach ($users as $user) {
                $mail->setTo(array($user->email => $user->name))->send();
            }
            
            $subscriptions->save();
        }
    }
}