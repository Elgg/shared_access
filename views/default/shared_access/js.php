<?php
/**
 * Elgg shared access plugin language pack
 * 
 * @package ElggSharedAccess
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider Ltd
 * @copyright Curverider Ltd 2008-2010
 * @link http://elgg.com/
 * @author Brett Profitt
 */
?>
<script type="text/javascript">
// bind to dropdown
$(document).ready(function() {
	$('a.ajax_loader').click(function() {
		var target = $(this).parents('div.shared_access').find('.ajax_loader_target');
		var url = $(this).attr('href') + '?ajax=1';
		
		shared_access_load_ajax(url, target);
		return false;
	});
});

function shared_access_load_ajax(url, target) {
	target.load(url, '', function(text, status, XHR) {
		if (status == 'success') {
			$(target).slideDown();
		} else {

		};
	});
}


</script>