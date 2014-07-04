<?php
/**
 * @version     $Id: default_overview.php 1041 2011-10-09 00:04:40Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Components
 * @subpackage  Debug
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */
defined('KOOWA') or die( 'Restricted access' ); ?>

<h4>
<?= @text('Memory : ') ?>
<?= $memory; ?>
</h4>

<h4>
<?= @text('Queries : ') ?>
<?= count($queries);?>
</h4>