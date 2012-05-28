<?php
class ComForaDatabaseBehaviorCommentable extends KDatabaseBehaviorAbstract
{
    public function _beforeTableInsert(KCommandContext $context)
    {
        if ($this->isModified('text')) {
            $this->text = strip_tags($this->text, '<a><b><blockquote><em><i><li><ol><p><span><strong><u><ul>');
        }
    }
    
    public function _beforeTableUpdate(KCommandContext $context)
    {
        $data = $context->data;
        
        if($data->answer)
        {
            $comments = $this->getTable()->select(array('table' => 'fora_topics', 'row' => $data->row));
            
            $table    = $this->getService('com://admin/fora.database.table.comments');
            $answer   = $table->select(array('id' => $comments->getColumn('id')), KDatabase::FETCH_ROW);
            
            if($answer->id != $data->id)
            {
                if($answer->id) {
                    $answer->delete();
                }
                
                $table->getRow()->setData(array('id' => $data->id))->save();
                
                // push the answer-activity into the stream
                $topic = $this->getService('com://admin/fora.model.topics')->id($data->row)->getItem();
                $identifier = $context->caller->getIdentifier();
                
                $log = array(
                		'action'	  => $context->action,
                		'application' => $identifier->application,
                		'type'        => $identifier->type,
                		'package'     => 'fora',
                		'name'        => 'topic', 
                		'status'      => 'answered',
                		'created_by'  => JFactory::getUser()->id,
                		'row'         => $topic->id,
                		'title'       => $topic->title
                );
                
                $activity = $this->getService('com://admin/activities.database.row.activity', array('data' => $log));
                $activity->save();
                
                $this->getService('com://site/fora.database.row.activity')->setData(array('activities_activity_id' => $activity->id, 'fora_topic_id' => $topic->id, 'comments_comment_id' => $data->id))->save();
                
            }
        }
    }
    
    public function _afterTableDelete(KCommandContext $context)
    {
        if ($context->data->getStatus() == KDatabase::STATUS_DELETED) {
            $answer = $this->getService('com://admin/fora.database.table.comments')
                ->select($context->data->id, KDatabase::FETCH_ROW);
            if ($answer->getStatus() == KDatabase::STATUS_LOADED) {
                $answer->delete();
            }
        }
    }
}