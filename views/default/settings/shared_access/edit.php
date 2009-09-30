<?php
/**
 * Elgg shared access plugin
 * 
 * @package ElggSharedAccess
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider Ltd
 * @copyright Curverider Ltd 2008-2009
 * @link http://elgg.com/
 * @author Brett Profitt
 */

	if (!$show = get_plugin_setting('show_in_tools_menu', 'shared_access')) {
		set_plugin_setting('show_in_tools_menu', 'yes', 'shared_access');
	}
?>
<p>
	<?php echo elgg_echo('shared_access:show_in_tools_menu'); ?>
	
	<?php echo elgg_view('input/pulldown', array(
		'internalname' => 'params[show_in_tools_menu]', 
		'value' => $show,
		'options_values' => array('yes'=>elgg_echo('option:yes'), 'no' => elgg_echo('option:no'))
		)
	); ?>
</p>