<?
/**
 * @version		$Id: default.php 3024 2011-10-09 01:44:30Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Weblinks
 * @copyright	Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

defined('KOOWA') or die('Restricted access'); ?>

<?= @template('com://site/search.view.results.default_form');?>

<?if (count($results)) :?>
    <?= @template('com://site/search.view.results.default_results');?>
<? endif;?>

