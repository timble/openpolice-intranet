<?php
class ComNewsControllerBehaviorLoggable extends KControllerBehaviorAbstract
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
            'actions'      => array('after.add', 'after.edit', 'after.delete'),
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
						$article = $row;
						$comment_id = null;
						
                        switch($name)
                        {
                        	case 'comment':
                        		$article = $this->getService('com://site/news.model.articles')->id($row->row)->getItem();
                        		$comment_id = $row->id;
                        		$log['title'] = $article->title;
                        		break;
                        	case 'article':
                        	default:
                        		$log['title'] = $row->title;
                        		break;
                        }

                        if (empty($log['title'])) {
                            $log['title'] = '#'.$row->id;
                        }

                        $activity = $this->getService('com://admin/activities.database.row.activity', array('data' => $log));
                        $activity->save();

                        $data = array('activities_activity_id' => $activity->id, 'news_article_id' => $article->id, 'comments_comment_id' => $comment_id);
                        $this->getService('com://site/news.database.row.activity')->setData($data)->save();
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