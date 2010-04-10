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
 
set_context('activity');

$area1 = elgg_view('shared_access/shared_access_topbar', array('sac' => $vars['sac']));

$limit = get_input('limit', 20);
//$entities = get_entities_from_access_id($sac->acl_id);
$entities = elgg_get_entities_from_access_id(array('access_id' => $vars['sac']->acl_id, 'group_by' => 'e.guid'));
$entity_guids = array();
foreach ($entities as $entity) {
	$entity_guids[] = $entity->getGUID();
}

if (count($entity_guids) > 0) {
	$body = elgg_view_river_items('', $entity_guids, '', '', '', '', $limit);
} else {
	$body .= elgg_echo('shared_access:no_shared_content');
}

//include a view for plugins to extend
$area3 = elgg_view("riverdashboard/menu");
$area3 .= elgg_view('shared_access/sidebar/riverdashboard_ext', array('sac' => $vars['sac']));

$body = elgg_view_layout("one_column_with_sidebar", $area1.$body, $area3);

echo $body;