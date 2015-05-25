<?php

/**
 * @Author GaNguCay (gangucay@gmail.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @copyright Freeware
 * @createdate 11/08/2010
 */

if ( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' ) or ! defined( 'NV_IS_MODADMIN' ) )
    die( 'Stop!!!' );
$submenu['config'] = $lang_module['config'];
$submenu['import'] = $lang_module['import'];
$submenu['del'] = $lang_module['del'];
$submenu['quanli'] = $lang_module['quanli'];
$allow_func = array( 'main', 'del', 'config', 'import','quanli','edit_tkb');
define( 'NV_IS_FILE_ADMIN', true );
function realstring($text) {
	$text = str_replace ( "\'", "'", $text );
	$text = str_replace ( '\"', '"', $text );
	$text = str_replace ( "\\\\", "\\", $text );
	return $text;
}
function array_search_dups($array)
{
    $dup_array = $array;
    $dup_array = array_unique($dup_array);
    if(count($dup_array) != count($array))
    {
        return TRUE;
    }
    else
    {
        return FALSE;
    }
} 
function nv_add_theme ( $contents )
{
    if ( ! empty( $contents['upload_blocked'] ) )
    {
        $return = "<div class=\"quote\" style=\"width:800px;\">\n";
        $return .= "<blockquote><span>" . $contents['upload_blocked'] . "</span></blockquote>\n";
        $return .= "</div>\n";
        $return .= "<div class=\"clear\"></div>\n";
        return $return;
        exit();
    }
    
    $return = "";
    $class = $contents['is_error'] ? " class=\"error\"" : "";
    $return .= "<div class=\"quote\" style=\"width:780px;\">\n";
    $return .= "<blockquote" . $class . "><span>" . $contents['info'] . "</span></blockquote>\n";
    $return .= "</div>\n";
    $return .= "<div class=\"clear\"></div>\n";
    
    $return .= "<form method=\"post\" enctype=\"multipart/form-data\" action=\"" . $contents['action'] . "\">\n";
    $return .= "<div style=\"WIDTH:800px;\">\n";
    $return .= "<input type=\"hidden\" value=\"1\" name=\"save\" id=\"save\" />\n";
    $return .= "<table summary=\"" . $contents['info'] . "\" class=\"tab1\">\n";
    $return .= "<col style=\"width:250px;white-space:nowrap\" />\n";
    $return .= "<col valign=\"top\" width=\"10px\" />\n";
    
    $return .= "<tbody class=\"second\">\n";
    $return .= "<tr>\n";
    $return .= "<td>" . $contents['title'][0] . ":</td>\n";
    $return .= "<td><sup class=\"required\">&lowast;</sup></td>\n";
    $return .= "<td><input name=\"" . $contents['title'][1] . "\" id=\"" . $contents['title'][1] . "\" type=\"text\" value=\"" . $contents['title'][2] . "\" style=\"width:300px\" maxlength=\"" . $contents['title'][3] . "\" /></td>\n";
    $return .= "</tr>\n";
    $return .= "</tbody>\n";
    
    $return .= "<tbody>\n";
    $return .= "<tr>\n";
    $return .= "<td>" . $contents['plan'][0] . ":</td>\n";
    $return .= "<td><sup class=\"required\">&lowast;</sup></td>\n";
    $return .= "<td><select name=\"" . $contents['plan'][1] . "\" id=\"" . $contents['plan'][1] . "\">\n";
    foreach ( $contents['plan'][2] as $pid => $ptitle )
    {
        $return .= "<option value=\"" . $pid . "\"" . ( $pid == $contents['plan'][3] ? " selected=\"selected\"" : "" ) . ">" . $ptitle . "</option>\n";
    }
    $return .= "</select></td>\n";
    $return .= "</tr>\n";
    $return .= "</tbody>\n";
    
    $return .= "<tbody class=\"second\">\n";
    $return .= "<tr>\n";
    $return .= "<td>" . $contents['client'][0] . ":</td>\n";
    $return .= "<td></td>\n";
    $return .= "<td><select name=\"" . $contents['client'][1] . "\" id=\"" . $contents['client'][1] . "\">\n";
    $return .= "<option value=\"\">&nbsp;</option>\n";
    foreach ( $contents['client'][2] as $clid => $clname )
    {
        $return .= "<option value=\"" . $clid . "\"" . ( $clid == $contents['client'][3] ? " selected=\"selected\"" : "" ) . ">" . $clname . "</option>\n";
    }
    $return .= "</select></td>\n";
    $return .= "</tr>\n";
    $return .= "</tbody>\n";
    
    $return .= "<tbody>\n";
    $return .= "<tr>\n";
    $return .= "<td>" . $contents['upload'][0] . ":</td>\n";
    $return .= "<td><sup class=\"required\">&lowast;</sup></td>\n";
    $return .= "<td><input name=\"" . $contents['upload'][1] . "\" type=\"file\" /></td>\n";
    $return .= "</tr>\n";
    $return .= "</tbody>\n";
    
    $return .= "<tbody class=\"second\">\n";
    $return .= "<tr>\n";
    $return .= "<td>" . $contents['file_alt'][0] . ":</td>\n";
    $return .= "<td></td>\n";
    $return .= "<td><input name=\"" . $contents['file_alt'][1] . "\" id=\"" . $contents['file_alt'][1] . "\" type=\"text\" value=\"" . $contents['file_alt'][2] . "\" style=\"width:300px\" maxlength=\"" . $contents['file_alt'][3] . "\" /></td>\n";
    $return .= "</tr>\n";
    $return .= "</tbody>\n";
    
    $return .= "<tbody>\n";
    $return .= "<tr>\n";
    $return .= "<td>" . $contents['click_url'][0] . ":</td>\n";
    $return .= "<td></td>\n";
    $return .= "<td><input name=\"" . $contents['click_url'][1] . "\" id=\"" . $contents['click_url'][1] . "\" type=\"text\" value=\"" . $contents['click_url'][2] . "\" style=\"width:300px\" maxlength=\"" . $contents['click_url'][3] . "\" /></td>\n";
    $return .= "</tr>\n";
    $return .= "</tbody>\n";
    
    $return .= "<tbody class=\"second\">\n";
    $return .= "<tr>\n";
    $return .= "<td>" . $contents['publ_date'][0] . ":</td>\n";
    $return .= "<td></td>\n";
    $return .= "<td><input name=\"" . $contents['publ_date'][1] . "\" id=\"" . $contents['publ_date'][1] . "\" type=\"text\" value=\"" . $contents['publ_date'][2] . "\" style=\"width:278px\" maxlength=\"" . $contents['publ_date'][3] . "\" readonly=\"readonly\" />\n";
    $return .= "<img src=\"" . $contents['publ_date'][4] . "\" widht=\"" . $contents['publ_date'][5] . "\" height=\"" . $contents['publ_date'][6] . "\" style=\"cursor:pointer;vertical-align: middle;\" onclick=\"" . $contents['publ_date'][7] . "\" alt=\"\" /></td>\n";
    $return .= "</tr>\n";
    $return .= "</tbody>\n";
    
    $return .= "<tbody>\n";
    $return .= "<tr>\n";
    $return .= "<td>" . $contents['exp_date'][0] . ":</td>\n";
    $return .= "<td></td>\n";
    $return .= "<td><input name=\"" . $contents['exp_date'][1] . "\" id=\"" . $contents['exp_date'][1] . "\" type=\"text\" value=\"" . $contents['exp_date'][2] . "\" style=\"width:278px\" maxlength=\"" . $contents['exp_date'][3] . "\" readonly=\"readonly\" />\n";
    $return .= "<img src=\"" . $contents['exp_date'][4] . "\" widht=\"" . $contents['exp_date'][5] . "\" height=\"" . $contents['exp_date'][6] . "\" style=\"cursor:pointer;vertical-align: middle;\" onclick=\"" . $contents['exp_date'][7] . "\" alt=\"\" /></td>\n";
    $return .= "</tr>\n";
    $return .= "</tbody>\n";
    
    $return .= "</table>\n";
    
    $return .= "<div style=\"PADDING-TOP:10px;\">\n";
    $return .= "<input type=\"submit\" value=\"" . $contents['submit'] . "\" />\n";
    $return .= "</div>\n";
    
    $return .= "</div>\n";
    $return .= "</form>\n";
    
    return $return;
}

