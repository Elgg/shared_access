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

$user = $vars['user'];
$sac = $vars['sac'];
$owner = get_entity($sac->owner_guid);

if ($vars['invitation']) {
	$invite = '
	<div class="shared_access_invite_notice"><span>' . elgg_echo('shared_access:invited_to_sac') . "
		<a href=\"{$vars['url']}action/shared_access/join?guid={$sac->getGUID()}\">" . elgg_echo('shared_access:join') . "</a> | 
		<a href=\"{$vars['url']}action/shared_access/decline?guid={$sac->getGUID()}\">" . elgg_echo('shared_access:decline') . "</a>
	</span></div>";
} else {
	$invite = '';
}

$members_count = get_entities_from_relationship('shared_access_member', $sac->getGUID(), true, null, 
	null, null, null, null, null, true);
if ($members_count == 1) {
	$members_str = sprintf(elgg_echo('shared_access:member_count_singular'), $members_count);
} else {
	$members_str = sprintf(elgg_echo('shared_access:member_count'), $members_count);
}
$details_html = "<a class=\"shared_access_details_link ajax_loader\" href=\"{$vars['url']}pg/shared_access/{$sac->getGUID()}/details\">$members_str</a>";

$owner_html = "<div class=\"shared_access_owner_icon\"><a href=\"{$owner->getURL()}\">" 
		. elgg_view('profile/icon', array('entity' => $owner, 'size' => 'tiny', 'override' => 'true'))
		. '</a></div>';
		
if ($owner->getGUID() == $user->getGUID()) {
	$edit_html	= "<div class=\"delete_collection\"><a onClick=\"return confirm('" . addslashes(elgg_echo('question:areyousure')) . "');\" href=\"{$vars['url']}action/shared_access/delete?collection=" . $sac->acl_id . "\">" . elgg_echo('delete') . "</a></div>";
	$edit_html .= "<div class=\"edit_collectoin\"><a class=\"shared_access_edit_link ajax_loader\" href=\"{$vars['url']}pg/shared_access/{$sac->getGUID()}/edit\">"
		. elgg_echo('edit') . '</a></div>';
		
} else {
	$edit_html = '';
}

echo <<<___END
<div class="contentWrapper shared_access">
	$invite

	$owner_html
	$details_html
	$edit_html
	<h2 class="shared_access_name"><a href="{$vars['url']}pg/shared_access/{$sac->getGUID()}">{$sac->title}</a></h2>
	
	<div class="ajax_loader_target"></div>
	<div class="clearfloat" /></div>
</div>

___END;

?>