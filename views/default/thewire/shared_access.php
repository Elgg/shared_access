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

$area1 = elgg_view("shared_access/sidebar/sidebar_links");
//include a view for to-do's to extend
$area1 .= elgg_view("thewire/todo", $vars);

$area2 .= elgg_view_title(elgg_echo('shared_access:shared_access') . ": " . $vars['sac']->title);
if(isloggedin())
	$area2 .= elgg_view("thewire/forms/add", array('access_id' => $vars['sac']->acl_id, 'location' => 'referer'));

$get_wireposts = get_entities_from_annotations("object", "thewire", "wire_reply", "", 0, 0, 20, 0, "desc", false);

$get_wireposts = get_entities_from_access_id($vars['sac']->acl_id, 'object', 'thewire', null, 10);


$area2 .= elgg_view("thewire/display", array("entities" => $get_wireposts));

//include a view for plugins to extend
$area3 .= elgg_view("thewire/sidebar_options", array_merge($vars, array("object_type" => 'thewire')));

$body = elgg_view_layout("sidebar_boxes", $area1, $area2, $area3);

echo $body;