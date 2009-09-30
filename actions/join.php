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

gatekeeper();
$user = get_loggedin_user();

if (!$guid = get_input('guid', false) OR !($sac = get_entity($guid) AND $sac->getSubtype() == 'shared_access')) {
	register_error(elgg_echo('shared_access:errorjoining'));
} else {
	if (remove_entity_relationship($user->getGUID(), 'shared_access_invitation', $guid)
		AND add_entity_relationship($user->getGUID(), 'shared_access_member', $guid)) {
		system_message(sprintf(elgg_echo('shared_access:joined'), $sac->title));
	} else {
		register_error(elgg_echo('shared_access:errorjoining'));
	}
}

forward($_SERVER['HTTP_REFERER']);