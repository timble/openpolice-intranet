<?php
/**
 * @version     $Id:redirect.php 10 2008-04-01 16:35:26Z mjaz $
 * @package     Redirect
 * @copyright   Copyright (C) 2007 - 2008 Joomlatools. All rights reserved.
 * @license     GNU GPLv2 <http://www.gnu.org/licenses/old-licenses/gpl-2.0.html>
 * @link        http://www.nooku.org
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

$menu   = JSite::getMenu();;
$params = $menu->getParams($menu->getActive()->id);

$app = JFactory::getApplication();
$app->redirect($params->get('url'));
die;