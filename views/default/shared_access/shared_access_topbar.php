<?php
/**
 * Shared access collection header
 */
 
//grab the current sac
$sac = $vars['sac'];
//set some variables
$sac_owner = get_user($sac->owner_guid);
if(get_context() == 'thewire')
	set_context('conversations');
else
	set_context('activity');

$context = "Channel";
$sac_owner_icon = elgg_view('profile/icon', array('entity' => $sac_owner, 'size' => 'tiny', 'override' => 'true'));
//count collection members
$members_count = get_entities_from_relationship('shared_access_member', $sac->getGUID(), true, null,
	null, null, null, null, null, true);
if($members_count <= 4){
	$members_count = "";
	$show_more = false;
}else{
	$members_count = "+" . ($members_count - 4);
	$show_more = true;
}
// output members
$content = "<div id='SAC_Header'>";
$content .= "<div id='SAC_Details'><table><tr>";
//only show the edit option for the collection owner
if($sac_owner->getGUID() == get_loggedin_user()->getGUID()) {
	$content .= "<td><div id='SAC_Edit'><a href='{$vars['url']}pg/shared_access/home?sac_guid={$sac->getGUID()}#sac-{$sac->getGUID()}'>Edit</a></div></td>";
}
$content .= "<td><div id='SAC_Owner'>{$sac_owner_icon}</div></td>";
$members = get_entities_from_relationship('shared_access_member', $sac->getGUID(), true, "", "", 0, "", 3);
foreach ($members as $member) {
	//don't show the owner, they have been pulled out above
	if($member->guid != $sac_owner->guid)
		$content .= "<td><div class='SAC_Members'>" . elgg_view('profile/icon', array('entity' => $member, 'size' => 'tiny', 'override' => 'true')) . "</div></td>";
}
if($show_more)
	$content .= "<td><div class='SAC_Others'><span><a href='{$vars['url']}pg/shared_access/home?sac_guid={$sac->getGUID()}#sac-{$sac->getGUID()}'>{$members_count}</a></span></div></td>";
$content .= '</tr></table></div>';
$content .= "<div id='content_area_user_title'><h2>{$context}: ". elgg_echo($sac->title) . "</h2></div>";
$content .= "<div class='clearfloat'></div></div>";
//display
echo $content;
?>