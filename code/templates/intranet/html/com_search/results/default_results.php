<?
/**
 * @version		$Id: default_results.php 1755 2011-06-15 15:00:41Z johanjanssens $
 * @category	Nooku
 * @package     Nooku_Server
 * @subpackage  Weblinks
 * @copyright	Copyright (C) 2011 - 2012 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

defined('KOOWA') or die('Restricted access'); ?>

<? foreach( $results as $result ) : ?>
<h2><a href="<?= @route($result->href); ?>"><?= @escape($result->title) ?></a></h2>
<p><?= @helper('string.summary', array('text' => $result->text)); ?></p>
<? if ( $params->get( 'show_date' )) : ?>
<div class="small<?= @escape($params->get('pageclass_sfx')); ?>">
	<? if($result->created) : ?>
		<?= JHTML::Date($result->created);?>
	<? endif; ?>
</div>
<? endif; ?>

<?= @helper('com://site/news.template.helper.paginator.pagination', array('total' => $total, 'show_count' => false, 'show_limit' => false)) ?>