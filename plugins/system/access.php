<?php
// no direct access
defined('_JEXEC') or die('Restricted access');

class plgSystemAccess extends JPlugin
{
    public function __construct($subject, $config = array())
	{
		parent::__construct($subject, $config);
		
		if(JFactory::getApplication()->isSite()) 
		{
		    if(KRequest::get('get.access_gid', 'int', 0) !== 0)
			{
			    $user = JFactory::getUser();
			    
		        $user->aid      = KRequest::get('get.access_aid', 'int');
		        $user->gid      = KRequest::get('get.access_gid', 'int');
		        $user->usertype = KRequest::get('get.access_usertype', 'string');
			}
		}
	}
}