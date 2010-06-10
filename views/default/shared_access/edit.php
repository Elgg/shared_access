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

$sac_member_guids = array();
if ($sac = $vars['sac']) {
	$sac_name = $sac->title;
	$sac_desc = $sac->description;
	$sac_members = elgg_get_entities_from_relationship(array('relationship' => 'shared_access_member', 'relationship_guid' => $sac->getGUID(), 'inverse_relationship' => TRUE, 'limit' => 9999));

	foreach ($sac_members as $member) {
		$sac_member_guids[] = $member->getGUID();
	}
} else {
	$sac_name = get_input('sac_name');
	$sac_desc = get_input('sac_desc');
	$sac_guid = null;
	$sac_members = array();
}

$userpicker = elgg_view('input/userpicker', array(
	'internalname'=>'members',
	'value' => $sac_member_guids,
));

$form_body .= "
<div class='collection_details margin_top clearfloat'>
	<p><label>" . elgg_echo("shared_access:shared_access_name").elgg_view('input/text', array('internalname' => 'name', 'value'=>$sac_name))."</label></p>

<p>
	<label>" . elgg_echo("shared_access:shared_access_description")
		. elgg_view('input/text', array('internalname' => 'description', 'value'=>$sac_desc))
		.
	"
	</label>
</p>

<p>
	<label>" . elgg_echo('shared_access:members') . "</label>
	$userpicker
</p>

";

$form_body .= elgg_view('input/submit', array('value'=>elgg_echo('save'))) . "</div>"; 

if ($sac) {
	$form_body .= elgg_view('input/hidden', array('internalname' => 'sac_guid', 'value' => $sac->getGUID()));
}

echo elgg_view('input/form', array(
	'body' => $form_body,
	'action' => $vars['url'] . 'action/shared_access/edit'
));
