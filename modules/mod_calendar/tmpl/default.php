<?php
/**
 * @version     $Id: module.php 632 2011-03-20 14:28:45Z cristiano.cucco $
 * @category    Nooku
 * @package     Nooku_Server
 * @subpackage  Banners
 * @copyright   Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net).
 * @license     GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link        http://www.nooku.org
 */

defined('KOOWA') or die('Restricted access'); ?>

<ul class="module-events">
<? foreach ($events as $event) : ?>
	<li><?= $event->title ?><br /><small><?= @helper('date.humanize', array('date' => $event->start_date)) ?></small></li>
<? endforeach ?>
</ul>