<?php
// @TODO should we override ComActivitiesControllerBehaviorLoggable in some way?
class ComForaControllerBehaviorLoggable extends KControllerBehaviorAbstract
{
    /**
     * List of actions to log
     *
     * @var array
     */
    protected $_actions;

    /**
     * The name of the column to use as the title column in the log entry
     *
     * @var string
     */
    protected $_title_column;

    public function __construct(KConfig $config)
    {
        parent::__construct($config);

        $this->_actions      = KConfig::unbox($config->actions);
        $this->_title_column = KConfig::unbox($config->title_column);
    }

    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'priority'     => KCommand::PRIORITY_LOWEST,
            'actions'      => array('after.add'),
            'title_column' => array('title', 'name'),
        ));

        parent::_initialize($config);
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
    }

    public function getHandle()
    {
        return KMixinAbstract::getHandle();
    }
}