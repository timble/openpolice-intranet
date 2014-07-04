<?php
/**
 * @version     $Id: site.php 813 2011-04-04 23:45:54Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Sites
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Site Database Row Class
 *
 * @author      Johan Janssens <http://nooku.assembla.com/profile/johanjanssens>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Sites
 */
class ComSitesDatabaseRowSite extends KDatabaseRowAbstract
{       
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'identity_column'   => 'name'
        ));

        parent::_initialize($config);
    }
}