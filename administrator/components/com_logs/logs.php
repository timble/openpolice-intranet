<?php
/**
 * @version		$Id: logs.php 1481 2012-02-10 01:46:24Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Components
 * @subpackage  Logs
 * @copyright	Copyright (C) 2010 - 2012 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

/**
 * Revision Row
 *
 * @author      Israel Canasa <raeldc@gmail.com>
 * @category	Nooku
 * @package    	Nooku_Components
 * @subpackage 	Logs
 */
echo KService::get('com://admin/logs.dispatcher')->dispatch();