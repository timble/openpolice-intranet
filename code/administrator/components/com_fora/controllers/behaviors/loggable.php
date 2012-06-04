<?php
// @TODO should we override ComActivitiesControllerBehaviorLoggable in some way?
class ComForaControllerBehaviorLoggable extends ComActivitiesControllerBehaviorLoggable
{
    protected function _initialize(KConfig $config)
    {
        parent::_initialize($config);
        
        $config->actions = array('after.add');
    }
    
    public function execute($name, KCommandContext $context)
    {
        if(in_array($name, $this->_actions))
        {
            $data = $context->result;

            if($data instanceof KDatabaseRowAbstract || $data instanceof KDatabaseRowsetAbstract )
            {
                $rowset = array();

                if ($data instanceof KDatabaseRowAbstract) {
                    $rowset[] = $data;
                } else {
                    $rowset = $data;
                }

                foreach ($rowset as $row)
                {
                    //Only log if the row status is valid.
                    $status = $row->getStatus();

					if(!empty($status) && $status !== KDatabase::STATUS_FAILED 
							&& $status !== KDatabase::STATUS_LOADED)
                    {                    	
						$identifier = $context->caller->getIdentifier();

						$log = array(
                            'action'	  => $context->action,
            				'application' => $identifier->application,
            				'type'        => $identifier->type,
            				'package'     => $identifier->package,
            				'name'        => $identifier->name,
                    		'status'      => $status,
                    		'created_by'  => JFactory::getUser()->id,
                    		'row'         => $row->id
						);

						$name = $this->getMixer()->getIdentifier()->name;
						$topic = $row;
						$comment_id = null;
						
                        switch($name)
                        {
                        	case 'vote':
                        		$topic = $this->getService('com://site/fora.model.topics')->id($row->fora_topic_id)->getItem();
                        		$log['title'] = $topic->title;
                        		$log['row'] = $topic->id;
                        		break;
                        	case 'comment':
                        		$topic = $this->getService('com://site/fora.model.topics')->id($row->row)->getItem();
                        		$comment_id = $row->id;
                        		$log['title'] = $topic->title;
                        		break;
                        	case 'topic':
                        	default:
                        		$log['title'] = $row->title;
                        		break;
                        }

                        if (empty($log['title'])) {
                            $log['title'] = '#'.$row->id;
                        }

                        $activity = $this->getService('com://admin/activities.database.row.activity', array('data' => $log));
                        $activity->save();

                        $data = array('activities_activity_id' => $activity->id, 'fora_topic_id' => $topic->id, 'comments_comment_id' => $comment_id);
                        $this->getService('com://site/fora.database.row.activity')->setData($data)->save();
                    }
                }
            }
        }
        
        // call afterDelete directly, because ComActivitiesControllerBehaviorLoggable execute function does not calls it parent's method
        if($name == 'after.delete') {
        	$this->_afterDelete($context);
        }
    }
    
    protected function _afterDelete(KCommandContext $context)
    {
    	$data = $context->result;

    	if($data instanceof KDatabaseRowAbstract || $data instanceof KDatabaseRowsetAbstract )
    	{
    		$name = $this->getMixer()->getIdentifier()->name;
    		
    		if($name == 'vote')	{
    			return;
    		}
    		
    		$query = array(
    				'package'  => 'fora',
    				'row'    => ($data instanceof KDatabaseRowAbstract ? $data->id : $data->getColumn('id'))
    		);

    		$rows = $this->getService('com://admin/activities.database.table.activities')->select($query);

    		if(count($rows))
    		{
	    		$this->getService('com://admin/fora.database.table.activities')->select($rows->getColumn('id'))->delete();
	    		$rows->delete();
    		}
    	}
    }
}