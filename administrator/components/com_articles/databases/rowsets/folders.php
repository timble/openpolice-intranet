<?php
/**
 * @version     $Id: folders.php 1713 2011-06-10 21:26:34Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Articles
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Folders Database Rowset Class
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Articles
 */

class ComArticlesDatabaseRowsetFolders extends ComArticlesDatabaseRowsetNodes
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'new'               => false,
            'identity_column'   => 'id'
        ));

        parent::_initialize($config);
    }
}