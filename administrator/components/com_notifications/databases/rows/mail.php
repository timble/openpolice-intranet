<?php
/**
 * @version     $Id: message.php 202 2010-08-21 07:39:46Z shayne $
 * @version     Mail
 * @copyright	Copyright (C) 2010 Kainga Studios (Shayne Bartlett). All rights reserved.
 * @license 	GNU GPLv2 <http://www.gnu.org/licenses/old-licenses/gpl-2.0.html>
 */

require_once(JPATH_LIBRARIES . DS . 'swiftmailer' . DS . 'swift_required.php');

/**
 * Decorator class for Swiftmailer.
 * Provides access to SwiftMailer's fluent interface
 *
 * Example Usage:
 *
 * For a regular email
 *
 * $mail = KFactory::tmp('admin::com.notifications.database.row.mail')
 *       ->setSubject('Email Subject')
 *       ->setFrom(array('sentfrom@example.com' => 'Sent From'))
 *       ->setTo('sentto@example.com')
 *       ->setBody('<p>This is some HTML content</p>', 'text/html')
 *       ->addPart('<q>This is the same content as plain text</q>', 'text/plain')
 *       ->send();
 *
 * If a Swiftmailer plugin is to be used set it prior to the email.
 *
 *  * $mail = KFactory::tmp('admin::com.notifications.database.row.mail');
 *
 *    $mail->throttleMinutes('2');
 *
 *    $mail->setSubject('Email Subject')
 *          ->setFrom(array('sentfrom@example.com' => 'Sent From'))
 *          ->setTo('sentto@example.com')
 *          ->setBody('<p>This is some HTML content</p>', 'text/html')
 *          ->addPart('<q>This is the same content as plain text</q>', 'text/plain')
 *          ->send();
 *
 * For more information on SwiftMailer usage see
 *
 * @link http://swiftmailer.org/docs/introduction
 */
class ComNotificationsDatabaseRowMail extends KDatabaseRowAbstract
{

    /**
     * Swift_Mailer Object
     *
     * @var Swift_Mailer
     */
    protected $_mailer ;

    protected $_message;

    public $_failures ;

    public function __construct(KConfig $config = null)
    {
        parent::__construct($config);

        $this->_message = Swift_Message::newInstance();

        switch($config->method)
        {
        	case 'sendmail':
	            // WIP required -bs or -t switch
	            $transport = Swift_SendmailTransport::newInstance($config->sendmail);
	            break;
			case 'smtp':
               if($config->smtpauth == 1)
               {
                   if($config->smtpsecure != "none")
                   {
                       $transport = Swift_SmtpTransport::newInstance($config->smtphost,$config->smtpport, $config->smtpsecure)
                       		->setUsername($config->smtpuser)
                            ->setPassword($config->smtppass) ; 
                   } else {
                       $transport = Swift_SmtpTransport::newInstance($config->smtphost,$config->smtpport)
                             ->setUsername($config->smtpuser)
                             ->setPassword($config->smtppass) ; 
                   }                    
               } else {
                   if($config->smtpsecure != "none")
                   {
                       $transport = Swift_SmtpTransport::newInstance($config->smtphost,$config->smtpport, $config->smtpsecure); 
                   } else {
                       $transport = Swift_SmtpTransport::newInstance($config->smtphost,$config->smtpport); 
                   }                      
               }
               break;
			case 'spool':
			    // TODO: Make spool options configurable.
			    $transport = Swift_SpoolTransport::newInstance(new Swift_FileSpool('/var/spool/swift'));
			    break;
			    
	        case 'mail':
	        default:
	            $transport = Swift_MailTransport::newInstance();
	            break;
       }

       $this->_mailer = Swift_Mailer::newInstance($transport);

    }

    /**
     * Get Joomla!'s email paramenters, set up Swiftmail transport and mailer.
     *
     * @param KConfig $config
     */
    protected function _initialize(KConfig $config)
    {
        if(!isset($config)) $config = new KConfig();

        $app = JFactory::getApplication();

        $config->append(array(
            'method'        => $app->getCfg('mailer'),
            'sendmail'      => $app->getCfg('sendmail'),
            'smtphost'      => $app->getCfg('smtphost'),
            'smtpport'      => $app->getCfg('smtpport'),
            'smtpsecure'    => $app->getCfg('smtpsecure'),
            'smtpauth'      => $app->getCfg('smtpauth'),
            'smtpuser'      => $app->getCfg('smtpuser'),
            'smtppass'      => $app->getCfg('smtppass')
        ));
    }

    /**
     * Send same email to all recipients
     *
     */
    public function send()
    {
        $result =  $this->_mailer->send($this->_message, $failures);

        $this->_failures = $failures;

        return $result;
    }

    /**
     * Sends seperate emails to each recipient
     *
     */
    public function batchSend()
    {
        $result = $this->_mailer->batchSend($this->getObject(), $failures);

        $this->_failures = $failures;

        return $result;
    }

    /**
     * Sets up antiflood for SMTP connections only, where $quantity is the number
     * of emails to send before disconnecting the SMTP session and $pause
     * is an optional number of seconds before reconnection of the SMTP session.
     *
     * @param int $quantity
     * @param int $pause
     * @return <type>
     *
     * @link http://swiftmailer.org/docs/antiflood-plugin
     */
    public function antiFlood($quantity, $pause = null)
    {
        // Antiflood is only for SMTP connections.
        if($config->method != 'smtp') {
            return;
        }

        if($pause)
        {
            $this->_mailer->registerPlugin(new Swift_Plugins_AntiFloodPlugin($quantity, $pause));
        } else {
            $this->_mailer->registerPlugin(new Swift_Plugins_AntiFloodPlugin($quantity));
        }

        return ;
    }

    /**
     * Throttles to a number of messages per minute.
     * Can be used with any Transport method.
     *
     * @param int $messages
     *
     * @link http://swiftmailer.org/docs/throttler-plugin-howto
     */
    public function throttleMinutes($messages)
    {
        $this->_mailer->registerPlugin(new Swift_Plugins_ThrottlerPlugin($messages, Swift_Plugins_ThrottlerPlugin::MESSAGES_PER_MINUTE));
    }

    /**
     * Throttles to a nu,ber of bytes per minute
     * Can be used with any Transport method.
     *
     * @param <type> $bytes
     *
     * @link http://swiftmailer.org/docs/throttler-plugin-howto
     */
    public function throttleBytes($bytes)
    {
        $this->_mailer->registerPlugin(new Swift_Plugins_ThrottlerPlugin($bytes, Swift_Plugins_ThrottlerPlugin::BYTES_PER_MINUTE));
    }

    /**
     * Instatiates and configures SwiftMailer Decorator Plugin.
     * Use sendBatch when doing this.
     *
     * @param array $replacements
     *
     * @link http://swiftmailer.org/docs/decorator-plugin
     */
    public function decorator($replacements)
    {
        $this->_mailer->registerPlugin(new Swift_Plugins_DecoratorPlugin($replacements));
    }

    public function __call($method, $arguments)
    {
        if(method_exists($this->_message, $method))
        {
             call_user_func_array(array($this->_message, $method), $arguments);
             return $this;
        } else return parent::__call($method, $arguments);
        //return method_exists($this->_message, $method) ? $this->_message->$method : parent::__call($method, $arguments);
    }
}