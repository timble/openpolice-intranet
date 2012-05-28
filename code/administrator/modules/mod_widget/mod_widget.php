<?php
/**
 * @version		$Id: mod_widget.php 1042 2011-10-09 02:16:36Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Modules
 * @subpackage  Widget
 * @copyright	Copyright (C) 2010 - 2012 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

/**
 * Description
 *   
 * @author   	Stian Didriksen <http://nooku.assembla.com/profile/stiandidriksen>
 * @category	Nooku
 * @package    	Nooku_Server
 * @subpackage 	Widget
 */

echo KService::get('mod://admin/widget.html')
    	->module($module)
    	->attribs($attribs)
    	->display();