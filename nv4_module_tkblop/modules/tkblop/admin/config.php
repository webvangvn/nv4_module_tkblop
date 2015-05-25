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

include (NV_ROOTDIR . "/includes/class/geturl.class.php");
$data = file_get_contents ( NV_ROOTDIR . '/modules/tkblop/config.txt' );
$ex = explode ( '|', $data );
if ($nv_Request->isset_request ( 'do', 'post' )) {
	$str = htmlspecialchars ( trim ( $nv_Request->get_string ( 'tieudeTKB', 'post', '12' ) ), ENT_QUOTES ) . '|' . htmlspecialchars ( trim ( $nv_Request->get_string ( 'apdung', 'post', '20/08/2010' ) ), ENT_QUOTES ) . '|' . htmlspecialchars ( trim ( $nv_Request->get_string ( 'vaohoc_AM', 'post', '7h00' ) ), ENT_QUOTES ) . '|' . htmlspecialchars ( trim ( $nv_Request->get_string ( 'vaohoc_PM', 'post', '13h00' ) ), ENT_QUOTES );
	@chmod( NV_ROOTDIR . '/modules/tkblop/config.txt', 0777 );
	$f = fopen (NV_ROOTDIR . '/modules/tkblop/config.txt', "w" );
	fwrite ( $f, $str );
	fclose ( $f );
	@chmod( NV_ROOTDIR . '/modules/tkblop/config.txt', 0604 );
    $contents .= "<div class=\"quote\" style=\"width:780px;\">\n";
    $contents .= "<blockquote class=\"error\"><span>" . $lang_module['add_success'] . "</span></blockquote>\n";
    $contents .= "</div>\n";
    $contents .= "<div class=\"clear\"></div>\n";
}else{
$contents .= '<div id=\"list_mods\">
<form id="form1" name="form1" method="post" action="">
<table class="tab1">
	<tr>
		<td class="fr">Tiêu đề TKB</td>
		<td class="fr_2"><input name="tieudeTKB" type="text" id="tieudeTKB" size="75" value="' . $ex [0] . '" /> </td>
	</tr>
	<tr>
		<td class="fr">Ngày áp dụng TKB</td>
		<td class="fr_2"><input name="apdung" type="text" id="apdung" size="75" value="' . $ex [1] . '" /> </td>
	</tr>
	<tr>
		<td class="fr">Giờ vào học buổi sáng</td>
		<td class="fr_2"><input name="vaohoc_AM" type="text" id="vaohoc_AM" size="75" value="' . $ex [2] . '" /> </td>
	</tr>
	<tr>
		<td class="fr">Giờ vào học buổi chiều</td>
		<td class="fr_2"><input name="vaohoc_PM" type="text" id="vaohoc_PM" size="75" value="' . $ex [3] . '" /> </td>
	</tr>
	<tr>
		<td colspan="2" align="center" class="fr2"><input type="submit" name="do" id="do" value="Lưu lại" /></td>
	</tr>
</table>
</form></div>';
}
include (NV_ROOTDIR . "/includes/header.php");
echo nv_admin_theme ( $contents );
include (NV_ROOTDIR . "/includes/footer.php");

