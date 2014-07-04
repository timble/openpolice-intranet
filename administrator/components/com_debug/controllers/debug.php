<?php
/**
 * @version     $Id: debug.php 1041 2011-10-09 00:04:40Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Components
 * @subpackage  Debug
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org

/**
 * Debug Controller Class
 *
 * @author      Stian Didriksen <http://nooku.assembla.com/profile/stiandidriksen>
 * @category    Nooku
 * @package     Nooku_Components
 * @subpackage  Debug
 */
class ComDebugControllerDebug extends ComDefaultControllerResource
{
    protected function _initialize(KConfig $config) 
    {
        parent::_initialize($config);

        //Don't dispatch event or allow callbacks
        $config->dispatch_events  = false;
        $config->enable_callbacks = false;

        //Force request variables
        $config->request->view   = 'debug';
        $config->request->layout = 'default';
    }
}