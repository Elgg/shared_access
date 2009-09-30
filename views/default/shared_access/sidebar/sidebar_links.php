<?php

	/**
	 * Elgg thewire sidebar links
	 * 
	 * @package ElggTheWire
	 * @license Private
	 * @author Curverider <info@elgg.com>
	 * @copyright Curverider Ltd 2008-2009
	 * @link http://elgg.com/
	 */
	
?>
<div class="sidebarBox">
<div id="owner_block_submenu"><ul>
<?php
	if(isloggedin()){
		echo "<li><a href=\"{$vars['url']}mod/thewire/everyone.php\">" . elgg_echo('thewire:all') . "</a></li>";
		echo "<li><a href=\"{$vars['url']}pg/thewire/" . $_SESSION['user']->username . "\">". elgg_echo('thewire:read') ."</a></li>";
	}
?>
</ul></div></div>