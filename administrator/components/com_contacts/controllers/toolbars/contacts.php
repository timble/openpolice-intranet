<?php
/**
 * @version     $Id: contacts.php 3024 2011-10-09 01:44:30Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Contacts
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Contacts Menubar Class
 *
 * @author      Isreal Canasa <http://nooku.assembla.com/profile/israelcanasa>
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Contacts   
 */
class ComContactsControllerToolbarContacts extends ComDefaultControllerToolbarDefault
{
    public function getCommands()
    {
        $this->addSeparator()
              ->addEnable()
              ->addDisable();
         
        return parent::getCommands();
    }   
}