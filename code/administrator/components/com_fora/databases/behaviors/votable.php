<?php
class ComForaDatabaseBehaviorVotable extends KDatabaseBehaviorAbstract
{
    public function _beforeTableUpdate(KCommandContext $context)
    {
        if($action = $context->data->vote)
        {
            $row = $this->getService('com://admin/fora.database.row.vote', array('new' => $action == 'add'));
            $row->setData(array(
            	'fora_topic_id' => $context->data->id,
                'user_id'       => JFactory::getUser()->get('id')
            ));
            
            switch($action)
            {
                case 'add':
                    $row->save();
                    break;
                
                case'delete':
                    $row->delete();
                    break;
            }
            
            // Unset other modified fields for security reasons.
            $context->data->reset();
        }
    }
}