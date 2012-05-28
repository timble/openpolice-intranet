<?php
/**
 * @package	Subscriptions
 * @copyright	Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license	GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link	http://www.timble.net
 */

jimport( 'joomla.plugin.plugin' );

class plgAuthenticationSubscriptions extends JPlugin
{

//    This WILL be the Nooku version.
//    function onAuthenticate($credentials, $options, &$response)
//    {
//        $UserHelper = KFactory::get('lib.joomla.user.helper');
//
//        // Joomla does not like blank passwords
//        if (empty($credentials['password']))
//        {
//            $response->status = JAUTHENTICATE_STATUS_FAILURE;
//            $response->error_message = 'Empty password not allowed';
//            return false;
//        }
//
//        $result = KFactory::get('admin::com.subscriptions.model.user')->set('username', $credentials['username'])->getItem();
//        
//        if($result)
//        {
//                $parts	= explode( ':', $result->password );
//                $crypt	= $parts[0];
//                $salt	= @$parts[1];
//                $testcrypt = JUserHelper::getCryptedPassword($credentials['password'], $salt);
//
//                if ($crypt == $testcrypt) {
//                        $user = JUser::getInstance($result->id); // Bring this in line with the rest of the system
//                        $response->email = $user->email;
//                        $response->fullname = $user->name;
//                        $response->status = JAUTHENTICATE_STATUS_SUCCESS;
//                        $response->error_message = '';
//                } else {
//                        $response->status = JAUTHENTICATE_STATUS_FAILURE;
//                        $response->error_message = 'Invalid password';
//                }
//        }
//        else
//        {
//                $response->status = JAUTHENTICATE_STATUS_FAILURE;
//                $response->error_message = 'User does not exist';
//        }
//    }
    
    function onAuthenticate( $credentials, $options, &$response )
    {
            jimport('joomla.user.helper');

            // Joomla does not like blank passwords
            if (empty($credentials['password']))
            {
                    $response->status = JAUTHENTICATE_STATUS_FAILURE;
                    $response->error_message = 'Empty password not allowed';
                    return false;
            }

            // Initialize variables
            $conditions = '';

            // Get a database object
            $db =& JFactory::getDBO();
            
            $query = 'SELECT `u`.`id` AS `id`, `u`.`password` AS `password`, `u`.`gid` AS `gid`, `s`.`end`'
                     . ' FROM `#__users` AS `u`, `#__subscriptions_subscribers` AS `s`'
                     . ' WHERE `u`.`username` = ' . $db->Quote( $credentials['username'] ) . ' AND `s`.`user_id` = `u`.`id`';

            $db->setQuery( $query );
            $result = $db->loadObject();

            if($result)
            {
                $parts	= explode( ':', $result->password );
                $crypt	= $parts[0];
                $salt	= @$parts[1];
                $testcrypt = JUserHelper::getCryptedPassword($credentials['password'], $salt);

                if ($crypt == $testcrypt && strtotime($result->end) > time()) {
                    $user = JUser::getInstance($result->id); // Bring this in line with the rest of the system
                    $response->email = $user->email;
                    $response->fullname = $user->name;
                    $response->status = JAUTHENTICATE_STATUS_SUCCESS;
                    $response->error_message = '';
                } elseif($crypt != $testcrypt) {
                    $response->status = JAUTHENTICATE_STATUS_FAILURE;
                    $response->error_message = 'Invalid password';
                } else {
                    $response->status = JAUTHENTICATE_STATUS_FAILURE;
                    $response->error_message = 'Subscription Expired';
                }
            }
            else
            {
                $response->status = JAUTHENTICATE_STATUS_FAILURE;
                $response->error_message = 'User does not exist';
            }
    }

}