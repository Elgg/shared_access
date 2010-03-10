<?php
/**
 * Elgg shared access plugin
 * 
 * @package ElggSharedAccess
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider Ltd
 * @copyright Curverider Ltd 2008-2010
 * @link http://elgg.com/
 * @author Brett Profitt
 */

$sac = $vars['sac'];
$sacs = get_entities_from_relationship('shared_access_member', $vars['user']->getGUID(), false, 'object', 'shared_access', null, null, 9999);
$limit = get_input('limit', 20);

if ($sacs) {
	// upper ACL select controls
	$options = '';
	foreach ($sacs as $option_sac) {
		$selected = ($option_sac->getGUID() == $sac->getGUID()) ? 'selected = "selected"' : '';
		$options .= "<option value=\"{$option_sac->getGUID()} $selected\">{$option_sac->title}</option>\n";
	}
	
	$select = <<<___END
	<select name="shared_access_id">
		$options
	</select>
___END;
	
	$upper_controls = "
	<div class=\"contentWrapper\">
		$select
		
		<a style=\"float: right;\" href=\"{$vars['url']}pg/shared_access/new\">" . elgg_echo('shared_access:new_collection') . '</a>
	</div>
	';
	
	$boxes = elgg_view('shared_access/sidebar/home', $vars);
	$boxes .= elgg_view('shared_access/sidebar/members', $vars);
	//$boxes .= elgg_view('shared_access/sidebar/notification', $vars);
	$boxes .= elgg_view('shared_access/sidebar/thewire', $vars);
	
	$body = elgg_view_title(elgg_echo('shared_access:shared_access') . ": " . $sac->title);
	//$body .= $upper_controls;
	//$content = get_entities_from_access_id($sac->acl_id);
	
	// get entities and show the river view
	// @todo currently have to grab all the entities, then pass them
	// as an array to 
	$entities = get_entities_from_access_id($sac->acl_id);
	$entity_guids = array();
	foreach ($entities as $entity) {
		$entity_guids[] = $entity->getGUID();
	}
	if (count($entity_guids) > 0) {
		$content = elgg_view_river_items('', $entity_guids, '', '', '', '', $limit);
		$body .= '<div class="contentWrapper">' . $content . '</div>';
	} else {
		$body .= '<div class="contentWrapper">' . elgg_echo('shared_access:no_shared_content') . '</div>';
	}
} else {

	$body =  elgg_view_title(elgg_echo('shared_access:shared_access') . ": " . $sac->title) .
	'
	<div class="contentWrapper">
		' . elgg_echo('shared_access:no_collections') . "
		<a style=\"float: right;\" href=\"{$vars['url']}pg/shared_access/new\">" . elgg_echo('shared_access:new_collection') . '</a>
	</div>
	';
	
}

echo elgg_view_layout('one_column_with_sidebar', $body, $boxes);
echo elgg_view('shared_access/js');