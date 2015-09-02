<?php
defined('_JEXEC') or die( 'Restricted access' );

jimport( 'joomla.plugin.plugin' );

class plgAuthenticationSSO extends JPlugin
{
	function onAuthenticate( $credentials, &$response )
	{
		jimport('joomla.user.helper');

		// TODO check against existing person-database
		
		// TODO improve format validation
		if(!preg_match('/P\\d+/is', $credentials['username'])) 
		{
			$response->status = JAUTHENTICATE_STATUS_FAILURE;
			$response->error_message = 'Invalid username';
			return false;
		}
		
		// Find the user in the table
		$user = KService::get('com://admin/users.database.table.users')
            				->select(array('username' => $credentials['username']), KDatabase::FETCH_ROW);

		if(!$user->isNew())
		{
			$response->email = $user->email;
			$response->username = $user->username;
			$response->fullname = $user->name;
			$response->status = JAUTHENTICATE_STATUS_SUCCESS;
			$response->error_message = '';
			
			return true;
		}

		$response->status = JAUTHENTICATE_STATUS_FAILURE;
		$response->error_message = 'User does not exist';
		
		return false;
	}
}