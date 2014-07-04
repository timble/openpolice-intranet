<?php
/**
 * @version		$Id: default.php 1344 2011-05-18 21:34:20Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Search
 * @copyright	Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

/**
 * Search Controller Class
 *
 * @author    	Arunas Mazeika <http://nooku.assembla.com/profile/amazeika>
 * @category 	Nooku
 * @package     Nooku_Server
 * @subpackage  Search
 */
class ComSearchControllerDefault extends ComDefaultControllerDefault
{
	protected function _initialize(KConfig $config)
	{
		$config->append(array(
		    'model'	     => 'results',
		    'view'	     => 'results',
		    'readonly'   => true
		));
		
		parent::_initialize($config);
	}
}