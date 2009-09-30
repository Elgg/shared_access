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

$user = get_loggedin_user();
$invitations = get_entities_from_relationship('shared_access_invitation', $user->getGUID(), null, null, null, null, null, 9999);

foreach ($invitations as $sac) {
	echo elgg_view('shared_access/invitation', array('sac' => $sac));
}