<?php
/**
 * @version     $Id: default.php 843 2011-04-06 21:06:44Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Users
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
defined('KOOWA') or die( 'Restricted access' ); ?>

<form action="" method="post" id="com-form-login" class="form-horizontal">
    <? if($parameters->get('show_page_title', 1)) : ?>
    <div class="page-header" style="padding-left: 20px;"><h1><?= @escape($parameters->get('page_title')) ?></h1></div>
    <? endif ?>
    
    <input type="hidden" name="action" value="login" />
    <? if($return): ?>
   	<input type="hidden" name="return" value="<?= $return ?>" />
    <? endif ?>

    <fieldset>
        <div class="control-group">
            <label class="control-label" for="username"><?= @text('Username') ?></label>
            <div class="controls">
                <input name="username" id="username" type="text" class="inputbox" alt="username" size="18" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="password"><?= @text('Password') ?></label>
            <div class="controls">
                <input type="password" id="password" name="password" class="inputbox" size="18" alt="password" />
            </div>
        </div>
        <div class="form-actions">
            <input type="submit" name="Submit" class="btn" value="<?= @text('LOGIN') ?>" /> or <a href="<?= @route('index.php?option=com_users&view=reset') ?>">
            <?= @text('FORGOT_YOUR_PASSWORD') ?></a>
        </div>
    </fieldset>
</form>