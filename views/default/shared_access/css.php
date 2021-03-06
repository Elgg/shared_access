<?php
/**
 * SharedAccess CSS
 * 
 * @package SharedAccess
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html GNU Public License version 2
 * @author Curverider Ltd
 * @copyright Curverider Ltd 2008-2010
 * @link http://elgg.com/
 */
?>
/* SharedAccess link in elgg topbar */
#elgg_topbar_contents a.shared_access {
	background:transparent url(<?php echo $vars['url']; ?>mod/shared_access/graphics/icons_shared_access.png) no-repeat 0 -15px;
	padding-left:20px !important;
	float:right;
}
/* SharedAccess submenu in sidebar on tools */
#elgg_sidebar h3.collections_filter_title {
	background:url(<?php echo $vars['url']; ?>mod/shared_access/graphics/icons_shared_access.png) no-repeat 0 -58px;
	padding-left:18px;
	padding-bottom:3px;
}

/* SharedAccess homepage / management page */
.shared_access_collection {
	-webkit-border-radius: 5px; 
	-moz-border-radius: 5px;
	background-color:#EEEEEE;
	margin:10px 0 0;
	padding:5px;
	width:auto;
}
.shared_access_collection h2.shared_access_name {
	line-height:1em;
	margin:4px 0 2px 5px;
	padding:0;
	width:370px;
	border:0;
}
.shared_access_owner_icon {
	float: right;
}
.shared_access_collection .delete_button {
	margin-right:50px;
	margin-top:6px;
}
.shared_access_collection .shared_access_edit_link  {
	float:right;
	margin-right:10px;
	margin-top:4px;
}
.shared_access_collection .leave_collection {
	margin-right:50px;
	margin-top:6px;
	float:right;
}
.shared_access_collection .shared_access_details_link {
	margin-left:400px;
	margin-top:4px;
	position:absolute;
	width:170px;
}
.shared_access_collection.requested {
	border:1px solid #D3322A;
}
.shared_access_collection .shared_access_invite_notice {
	margin:2px;
}
.shared_access_collection .shared_access_invite_notice span {
    background-color: #FDFFC3;
    color:#000000;
	-webkit-border-radius: 4px; 
	-moz-border-radius: 4px;
	padding:2px 4px;
}
.shared_access_collection .collection_details {
	background-color:white;
	-webkit-border-radius: 6px; 
	-moz-border-radius: 6px;
	margin:10px 5px 5px;
	padding:1px 10px 0;
}
.shared_access_collection .collection_details p {
	margin:5px 0 0 0;
}
.ajax_content_target {
	clear:both;
}

/* SharedAccess topbar (used on Activity and Conversations when filtered by Channel) */
#shared_access_topbar {
	background-color: #ececec;
	-webkit-border-radius: 8px; 
	-moz-border-radius: 8px;
	margin:0 0 10px 0;
	padding:5px;	
}
#shared_access_topbar h2 {
	margin:0 0 0 0;
	padding:0 0 0 22px;
	border:none;
	line-height:1.2em;
	background: url(<?php echo $vars['url']; ?>mod/shared_access/graphics/icons_shared_access.png) no-repeat 0 -76px;
}
#shared_access_topbar .entity_edit {
	margin-right:20px;
	margin-top:4px;
	display:block;
}
#shared_access_topbar .shared_access_members {
	margin-left:4px;
}
#shared_access_topbar .shared_access_owner {
	padding-right:4px;
	border-right:1px solid #cccccc;
}
#shared_access_topbar .shared_access_others {
	background: #999999;
	-webkit-border-radius: 5px; 
	-moz-border-radius: 5px;
	margin-left:4px;
	height:25px;
	min-width:23px;
	padding:0 2px;	
}
#shared_access_topbar .shared_access_others span {
	font-weight: bold;
	text-align: center;
	display: block;
	line-height: 1.7em;
}
#shared_access_topbar .shared_access_others span a {
	text-decoration: none;
	color:white;	
}

/* autocomplete / live search */
.ac_results {
	background-color:white;
	border:1px solid #cccccc;
	overflow:hidden;
	padding:0;
	z-index:99999;
	-webkit-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.45);
	-moz-box-shadow: 0 2px 5px rgba(0, 0, 0, 0.45); 
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
	font: menu;
	font-size: 12px;
}
.ac_loading {
	background:transparent url("<?php echo $vars['url']; ?>mod/shared_access/graphics/indicator.gif") no-repeat scroll right center;
}
.ac_odd {
	background-color:white;
}
.ac_over {
	background-color: #333333;
	color: white;	
}
.autocomplete {
	width:300px;
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
ul.users li:first-child {
	border-top:1px solid #cccccc;
}
.ac_input {
	width: 200px;
}
.ac_results strong {
	color:#1EADE6;
	font-weight:bold;
}
/* end auto-complete / live search */