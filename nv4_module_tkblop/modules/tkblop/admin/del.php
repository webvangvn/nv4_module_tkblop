<?php
/**
 * @Author GaNguCay (gangucay@gmail.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @copyright Freeware
 * @createdate 11/08/2010
 */

if (! defined ( 'NV_IS_FILE_ADMIN' ))
	die ( 'Stop!!!' );
	$page_title = $lang_module ['config_title'];
	$submit=$nv_Request->isset_request ( 'save', 'post' );
	if ($submit=="1") {
        $query = "DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . "";
        if ( $db->query( $query ) )
        {
            $db->sqlreset();
            $msg = $lang_module['del_success'];
        }
        else
        {
            $msg = $lang_module['del_error'];
        }
        if ( $msg != '' )
        {
            $contents .= "<div class=\"quote\" style=\"width:780px;\">\n";
            $contents .= "<blockquote class=\"error\"><span>" . $msg . "</span></blockquote>\n";
            $contents .= "</div>\n";
            $contents .= "<div class=\"clear\"></div>\n";
        }
	}
	else
	{
	$contents .= "<div>";
    $contents .= "<form name=\"deltkb\" action=\"\" method=\"post\">";
    $contents .= "<table summary=\"\" class=\"tab1\">\n";
    $contents .= "<td>";
    $contents .= "<center><b><font color=red>" . $lang_module['canhbaodel'] . "</font></b></center>";
    $contents .= "</td>\n";
    $contents .= "</table>";
    $contents .= "<input type=\"hidden\" value=\"1\" name=\"save\" id=\"save\" />";
    $contents .= "<center><input name=\"submit\" type=\"submit\" value=\"" . $lang_module['delyes'] . "\" id=\"confirm_0\"> &nbsp;";
	$contents .= "</form>";
    $contents .= "</div>";
	}
include (NV_ROOTDIR . "/includes/header.php");
echo nv_admin_theme ( $contents );
include (NV_ROOTDIR . "/includes/footer.php");

