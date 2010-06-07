<?php
/**
 * Shared access collection header
 */
 
//grab the current sac
$sac = $vars['sac'];
//set some variables
$sac_owner = get_user($sac->owner_guid);
if (get_context() == 'thewire') {
	set_context('conversations');
} else {
	set_context('activity');
}

$context = "Channel";
$sac_owner_icon = elgg_view('profile/icon', array('entity' => $sac_owner, 'size' => 'tiny'));

//count collection members
$members_count = elgg_get_entities_from_relationship(array(
	'relationship' => 'shared_access_member',
	'relationship_guid' => $sac->getGUID(),
	'inverse_relationship' => TRUE,
	'count' => TRUE,
));

if ($members_count <= 4) {
	$members_count = "";
	$show_more = false;
} else {
	$members_count = "+" . ($members_count - 4);
	$show_more = true;
}

// output members
$content = "<div id='shared_access_topbar' class='clearfloat'>";
$content .= "<div class='entity_metadata'><table><tr>";

//only show the edit option for the collection owner
if ($sac_owner->getGUID() == get_loggedin_user()->getGUID()) {
	$edit = elgg_echo('edit');
	$content .= '<td><span class="entity_edit">';
	$content .= "<a href='{$vars['url']}pg/shared_access/home?sac_guid={$sac->getGUID()}#sac-{$sac->getGUID()}'>$edit</a>";
	$content .= '</span></td>';
}
$content .= "<td><div class='shared_access_owner'>{$sac_owner_icon}</div></td>";

$members = elgg_get_entities_from_relationship(array(
	'relationship' => 'shared_access_member',
	'relationship_guid' => $sac->getGUID(),
	'inverse_relationship' => TRUE,
	'limit' => 3,
));
foreach ($members as $member) {
	//don't show the owner, they have been pulled out above
	if ($member->guid != $sac_owner->guid) {
		$content .= '<td><div class="shared_access_members">';
		$content .= elgg_view('profile/icon', array('entity' => $member, 'size' => 'tiny'));
		$content .= '</div></td>';
	}
}

if ($show_more) {
	$content .= '<td><div class="shared_access_others"><span>';
	$content .= "<a href='{$vars['url']}pg/shared_access/home?sac_guid={$sac->getGUID()}#sac-{$sac->getGUID()}'>$members_count</a>";
	$content .='</span></div></td>';
}

$title = elgg_echo($sac->title);
$content .= '</tr></table></div>';
$content .= "<h2>$context: $title</h2>";
$content .= "</div>";

//display
echo $content;
