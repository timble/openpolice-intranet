<?php
/**
 * @version     $Id: form.php 4266 2011-10-08 23:57:41Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Components
 * @subpackage  Default
 * @copyright   Copyright (C) 2007 - 2012 Johan Janssens. All rights reserved.
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

/**
 * Form Filter
.*
 * @author      Johan Janssens <johan@nooku.org>
 * @category    Nooku
 * @package     Nooku_Components
 * @subpackage  Default
 */
class ComDefaultTemplateFilterForm extends KTemplateFilterForm
{
    protected function _tokenValue($force = false)
    {
        if(empty($this->_token_value) || $force) {  
            $this->_token_value = JUtility::getToken($force);
        }
        
        return parent::_tokenValue($force);
    }
}