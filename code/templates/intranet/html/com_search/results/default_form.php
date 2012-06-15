<?
/**
 * @version		$Id: default_form.php 3046 2011-10-12 18:25:12Z ercanozkaya $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Weblinks
 * @copyright	Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

defined('KOOWA') or die('Restricted access'); ?>

<form id="searchForm" action="" method="get" name="searchForm">
	<div class="well input-append">
		<input type="text" name="term" id="term" maxlength="20" size="30" value="<?= @escape($state->term);?>" class="inputbox" /><button onclick="this.form.submit()" class="btn"><?=@text( 'Search' );?></button>
	</div>
</form>