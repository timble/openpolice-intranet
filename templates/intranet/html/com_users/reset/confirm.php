<?php
/**
 * @version     $Id: confirm.php 3046 2011-10-12 18:25:12Z ercanozkaya $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Users
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
defined('KOOWA') or die( 'Restricted access' ); ?>

<h1><?= @('Confirm your Account') ?></h1>

<form action="" method="post" class="josForm form-validate form-horizontal">
    <input type="hidden" name="action" value="confirm" />
    
    <p><?= @text('RESET_PASSWORD_CONFIRM_DESCRIPTION') ?></p>
    
    <div class="control-group">
    	<label for="email" class="control-label">
    	    <?= @text('Email Address') ?>:
    	</label>
    	<div class="controls">
    		<input id="email" class="input-xlarge" name="email" type="text" class="required" />
    		<p class="help-block"><?= @text('RESET_PASSWORD_EMAIL_TIP_TEXT') ?></p>
    	</div>
    </div>
    
    <div class="control-group">
    	<label for="token" class="control-label">
    	    <?= @text('Token') ?>:
    	</label>
    	<div class="controls">
    		<input id="token" class="input-xlarge" name="token" type="text" class="required" />
    		<p class="help-block"><?= @text('RESET_PASSWORD_TOKEN_TIP_TEXT') ?></p>
    	</div>
    </div>
    
    <div class="form-actions">
    	<button type="submit" class="validate btn btn-primary"><?= @text('Submit') ?></button>
    </div>    
</form>