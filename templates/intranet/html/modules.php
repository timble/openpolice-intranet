<?php
/**
 * @version		$Id: modules.php 8 2011-08-23 15:54:19Z tomjanssens $
 * @category	Nooku
 * @package		Nooku_Templates
 * @subpackage	Witblits
 * @copyright	Copyright (C) 2010 Timble CVBA and Contributors. (http://www.timble.net)
 * @license		GNU GPLv3 <http://www.gnu.org/licenses/gpl.html>
 * @link		http://www.nooku.org
 */

jimport('joomla.application.module.helper');

/*
 * xhtml (divs and font headder tags)
 */
function modChrome_xhtmls($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<div class="module clearfix <?php echo $module->module; ?> <?php echo $params->get('moduleclass_sfx'); ?>">
		<?php if ($module->showtitle != 0) : ?>
			<h3><?php echo $module->title; ?></h3>
		<?php endif; ?>
			<?php echo $module->content; ?>
		</div>
	<?php endif;
}

/*
 * No Module Title shown
 */
function modChrome_notitle($module, &$params, &$attribs)
{
	if (!empty ($module->content)) : ?>
		<div class="module <?php echo $module->module; ?> <?php echo $params->get('moduleclass_sfx'); ?>">
			<?php echo $module->content; ?>
		</div>
	<?php endif;
}

/*
 * Search module
 */
function modChrome_search($module, &$params, &$attribs)
{
	if (!empty ($module->content) && $module->module == 'mod_search') : ?>
		<div class="module <?php echo $module->module; ?> <?php echo $params->get('moduleclass_sfx'); ?>">
			<?php echo $module->content; ?>
		</div>
	<?php endif;
}