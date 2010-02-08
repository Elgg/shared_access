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
// have to pull from get_input() because the this view is called
// from the wire which doesn't know about sacs.
$sac = $vars['sac'];
if ($sac) {
	$sac_guid = $sac->getGUID();
} else {
	$sac_guid = '';
}

$user = get_loggedin_user();
$limit = 5;

$collections = get_entities_from_relationship('shared_access_member', $user->getGUID(), false, null, null, null, null, $limit);
$collections_count = get_entities_from_relationship('shared_access_member', $user->getGUID(), false, null, null, null, null, null, null, true);

$content = '<div id="owner_block_submenu"><ul class="thewire_shared_access">';

foreach ($collections as $collection) {
	if ($collection->getGUID() == $sac_guid) {
		$selected = 'selected';
	} else {
		$selected = '';
	}
	$content .= <<<___END
	<li class="thewire_shared_access $selected">
		<a href="{$vars['url']}pg/shared_access/thewire/{$collection->getGUID()}">{$collection->title}</a>
	</li>
___END;
}

if ($collections_count > $limit) {
	$content .= <<<___END
	<li class="thewire_shared_access more">
		<a href="{$vars['url']}pg/shared_access/home">More...</a>
	</li>
___END;
}
$content .= '</ul></div>';
?>

<div class="sidebarBox">
	<h3><?php echo elgg_echo('shared_access:collections'); ?></h3>
		<?php echo $content; ?>
</div>