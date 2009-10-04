<?php
/**
 * Elgg shared access plugin language pack - default theme
 * 
 * @package ElggSharedAccess
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider Ltd
 * @copyright Curverider Ltd 2008-2009
 * @link http://elgg.com/
 * @author Brett Profitt
 */
?>
.shared_access {
	padding:5px 5px 2px 10px;
	-webkit-border-radius: 5px; 
	-moz-border-radius: 5px;
	background-color:#eeeeee;
}
.ajax_loader_target .contentWrapper {
	clear:both;
	padding:0;
	margin:0;
	background-color: white;
	-webkit-border-radius: 5px; 
	-moz-border-radius: 5px;
}
/* dropdown edit area on collections */
.contentWrapper.shared_access .contentWrapper {
	padding:1px 10px 10px 10px;
	margin:0 0 10px 0;
}
.ajax_loader_target .contentWrapper p {
	margin:5px 0 0 0;
}
.user_picker_entry a.delete_collection {
	margin-right:10px;
}
.shared_access_owner_icon {
	float: right;
}
.shared_access_member_icon {
	float: left;
	padding: 0;
	margin:0 8px 8px 0;
}

/* autocomplete css */
.ac_results {
	background-color:white;
	border:1px solid #cccccc;
	overflow:hidden;
	padding:0;
	z-index:99999;
	-webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.45); /* safari v3+ */
	-moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.45); /* FF v3.5+ */
}
.ac_results ul {
	list-style-image:none;
	list-style-position:outside;
	list-style-type:none;
	margin:0;
	padding:0;
	width:100%;
}
.ac_results li {
	cursor:default;
	display:block;
	line-height:16px;
	margin:0;
	overflow:hidden;
	padding:2px 5px;
}
.ac_loading {
	background:transparent url("<?php echo $vars['url']; ?>mod/shared_access/graphics/indicator.gif") no-repeat scroll right center;
}
.ac_odd {
	background-color:white;
}
.ac_over {
	background-color: #555555;
	color: HighlightText;
}
.autocomplete {
	width:300px;
}
.user_picker .user_picker_entry {
	clear:both;
	height:25px;
	padding:5px;
	margin-top:5px;
	-webkit-border-radius: 5px; 
	-moz-border-radius: 5px;
	background-color:#eeeeee;
}
.livesearch_icon {
	float:left;
	padding-right:10px;
}
ul.users {
	list-style: none;
	margin:0;
	padding:0;
}
.ac_input {
	width: 200px;
}
.ac_results strong {
	color:#0054a7;
	font-weight:bold;
}
/* end auto-complete */




.shared_access_edit_link {
	float: right;
	margin-right: 10px;
	margin-top:4px;
}
.shared_access_details_link {
	float: right;
	width:170px;
	margin-top:4px;
}
.shared_access_invite_notice span {
    border:1px solid #D3322A;
    background:#F7DAD8;
    color:#000000;
	-webkit-border-radius: 5px; 
	-moz-border-radius: 5px;
	padding:2px 4px;
}
.delete_collection {
	float:right;
	margin-right: 50px;
	margin-top:6px;
	width:14px;
	height:14px;
}
.delete_collection a,
a.delete_collection {
	display:block;
	cursor: pointer;
	width:14px;
	height:14px;
	background: url("<?php echo $vars['url']; ?>mod/file/graphics/icon_delete.png") no-repeat 0 0;
	text-indent: -9000px;
}
.delete_collection a:hover,
a.delete_collection:hover {
	background-position: 0 -16px;
}

#thewire_small-textarea {
	margin: 0;
	padding: 0;
	width: 100%;
	height:120px;
}

#collections_page_head {
	border-bottom:none;
	margin:10px;
	padding:0;
}
#collections_page_head #content_area_user_title h2 {
	padding:0;
	margin:0;
	border-bottom:none;
}

.new_collection_button {
	float:right;
}
a.new_collection_button {
	-webkit-border-radius: 5px; 
	-moz-border-radius: 5px;
	background:#cccccc url(<?php echo $vars['url']; ?>mod/shared_access/graphics/button_background.gif) repeat-x 0 0;
	border:1px solid #999999;
	color:#333333;
	display:block;
	padding:2px 15px 2px 15px;
	text-align:center;
	font-weight:bold;
	text-decoration:none;
	text-shadow:0 1px 0 white;
}
a.new_collection_button:hover, 
a.new_collection_button:focus {
	background-position:0 -15px;
	color:#111111;
}
a.new_collection_button:active {
	background-image:none;
}

/* sidebar stuff */
#two_column_left_sidebar_boxes .sidebarBox .contentWrapper {
	margin-top:0;
	padding:7px;
}


