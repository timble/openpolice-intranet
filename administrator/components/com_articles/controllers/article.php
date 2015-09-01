<?php
/**
 * @version		$Id: category.php 3024 2011-10-09 01:44:30Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Articles
 * @copyright	Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

/**
 * Category Controller Class
 *
 * @author    	Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category 	Nooku
 * @package     Nooku_Server
 * @subpackage  Articles
 */
class ComArticlesControllerArticle extends ComDefaultControllerDefault
{
	/**
	 * @param KConfig $config
     */
	public function __construct(KConfig $config)
	{
		parent::__construct($config);
		
		$this->addBehavior('com://admin/activities.controller.behavior.loggable');
	}
	
    public function getRequest()
	{
		$this->_request['section'] = 'com_content';
	    return $this->_request;
	}
}