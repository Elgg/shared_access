<?php
/**
 * Elgg shared access plugin
 * 
 * @package ElggSharedAccess
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider Ltd
 * @copyright Curverider Ltd 2008-2010
 * @link http://elgg.com/
 */
 
set_context('thewire');

$area3 = elgg_view("shared_access/sidebar/sidebar_links");

//$area1 = elgg_view_title(elgg_echo('shared_access:shared_access') . ": " . $vars['sac']->title);
$area1 = elgg_view('shared_access/shared_access_topbar', array('sac' => $vars['sac']));

if(isloggedin())
	$area2 = elgg_view("conversations/forms/add", array('access_id' => $vars['sac']->acl_id, 'location' => 'referer'));

$get_wireposts = get_entities_from_access_id($vars['sac']->acl_id, 'object', 'conversations', null, 10);

$area2 .= elgg_view("conversations/display", array("entities" => $get_wireposts));

//include a view for plugins to extend
$area3 .= elgg_view("conversations/sidebar", array_merge($vars, array("object_type" => 'conversations')));

$body = elgg_view_layout("one_column_with_sidebar", $area1.$area2, $area3);

echo $body;