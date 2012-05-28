<?php
/**
 * @version     $Id: form.php 1882 2011-06-23 16:18:45Z ercanozkaya $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Users
 * @copyright   Copyright (C) 2011 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
defined('KOOWA') or die( 'Restricted access' ); ?>

<script>
    Window.onDomReady(function(){
        document.formvalidator.setHandler('passverify', function (value) { return ($('password').value == value); } );
    });
</script>

<form action="<?= @route('id='.$user->id) ?>" method="post" name="userform" autocomplete="off" class="form-validate form-horizontal well">
    <input type="hidden" name="action" value="save" />

    <legend><?= @escape($parameters->get('page_title')) ?></legend>
    <div class="control-group">
        <label class="control-label" for="name">
            <?= @text('Your Name') ?>:
        </label>
        <div class="controls">
            <input class="inputbox required" type="text" id="name" name="name" value="<?= @escape($user->name) ?>" size="40" disabled />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="email">
            <?= @text('email') ?>:
        </label>
        <div class="controls">
            <input class="inputbox required validate-email" type="text" id="email" name="email" value="<?= @escape($user->email) ?>" size="40" disabled />
        </div>
    </div>
    <? if($user->password) : ?>
    <div class="control-group">
        <label class="control-label" for="password">
            <?= @text('Password') ?>:
        </label>
        <div class="controls">
            <input class="inputbox validate-password" type="password" id="password" name="password" value="" size="40" />
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="password2">
            <?= @text('Verify Password') ?>:
        </label>
        <div class="controls">
            <input class="inputbox validate-passverify" type="password" id="password_verify" name="password_verify" size="40" />
        </div>
    </div>
    <? endif ?>
    
    <?
        $params = clone $user->params;
        $params->loadSetupFile(JPATH_THEMES.'/'.JFactory::getApplication()->getTemplate().'/html/com_users/user/user.xml');
        echo $params->render()
    ?>
    
    <div class="form-actions">
    	<button class="btn primary validate" type="submit" onclick="submitbutton( this.form );return false;"><?= @text('Save') ?></button>
    </div>
</form>
