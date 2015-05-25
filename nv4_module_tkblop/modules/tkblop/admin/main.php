<?php

/**
 * @Author GaNguCay (gangucay@gmail.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @copyright Freeware
 * @createdate 11/08/2010
 */

if (! defined ( 'NV_IS_FILE_ADMIN' ))
	die ( 'Stop!!!' );

$page_title = $lang_module ['module_info'];
$contents .= "<div id='edit'></div>\n";
$contents .= "<div class=\"quote\" style=\"width:780px;\">\n";
$contents .= "<blockquote class='error'><span id='message'>" . $lang_module ['copyright_info'] . "</span></blockquote>\n";
$contents .= "". $lang_module ['huongdan'] ." \n";
$contents .= "</div>\n";

include (NV_ROOTDIR . "/includes/header.php");
	echo nv_admin_theme ( $contents );
include (NV_ROOTDIR . "/includes/footer.php");
