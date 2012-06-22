<?php
class PlgKoowaSSO extends PlgKoowaDefault
{
    public function onBeforeDispatcherDispatch(KEvent $event)
    {
    	$application = JFactory::getApplication();
    	
    	if($application->getName() != 'site') {
    		return;
    	}
var_dump($_SERVER); exit();
    	// check if SSO header is set
    	$personnumber = KRequest::get('server.HTTP_P_SSO_IDENTIFIER', 'alnum');
    	if(empty($personnumber) || !preg_match('/P\\d+/is', $personnumber))
    	{
    		// TODO set proper http response
    		throw new KException('Access not allowed');
    	}
    	
    	// check if user is already logged in
    	$user = JFactory::getUser();
    	
    	// make sure personnumber is still the same
    	if(!$user->guest && $user->username != $personnumber) 
    	{
    		$application->logout();
    		$application->redirect(KRequest::url());
    	}
    	
    	if($user->guest)
    	{
    		$credentials = array(
    				'username' => $personnumber,
    				'password' => $personnumber
    		);
    		
    		$result = $application->login($credentials, array());
    		
    		if(JError::isError($result))
    		{
    			// TODO set proper http response
    			throw new KException($result->getError());
    		}
    		else {
    			$application->redirect('index.php');
    		}
    	}
    }
}