<?php
/**
 * @version     $Id: system.php 3024 2011-10-09 01:44:30Z johanjanssens $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Info
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * System Controller Class
 *
 * @author      John Bell <http://nooku.assembla.com/profile/johnbell>
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Info
 */

class ComInfoControllerSystem extends ComInfoControllerDefault
{
    protected function _initialize(KConfig $config)
    {
        $config->append(array(
            'model' => 'com://admin/info.model.system',
            'view'  => 'system'
        ));

        parent::_initialize($config);
    }
}