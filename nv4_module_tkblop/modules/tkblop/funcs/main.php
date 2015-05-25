<?php
/**
 * @Author GaNguCay (gangucay@gmail.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @copyright Freeware
 * @createdate 11/08/2010
 */
if ( ! defined( 'NV_IS_MOD_TKBLOP' ) ) die( 'Stop!!!' );

$page_title = $module_info['custom_title'];
$key_words = $module_info['keywords'];
//Doc du lieu tu file cau hinh
include (NV_ROOTDIR . "/includes/class/geturl.class.php");
$data = file_get_contents ( NV_ROOTDIR . '/modules/tkblop/config.txt' );
$ext = explode ( '|', $data );

//Loc danh sach lop tu CSDL
$sql = "SELECT DISTINCT lop FROM " . NV_PREFIXLANG . "_" . $module_data . " ORDER BY lop ASC";
$result = $db->query( $sql );
$data_danhsach = array();
while ($row = $result->fetch())
{
    $data_danhsach[]=$row['lop'];
}
$submit= $nv_Request->get_title( 'keywords', 'post' );
   	if($submit){
		$keywords=stripslashes(trim($submit));
		$sql1 = "SELECT tiet, thu2, thu3, thu4, thu5, thu6, thu7 FROM " . NV_PREFIXLANG . "_" . $module_data . " WHERE (lop LIKE '%$keywords') ORDER BY tiet asc";
		$result1 = $db->query( $sql1 );
		$content = array();
		$k=0;
		
		while ($rows = $result1->fetch()){
			$content[$k]=array($rows['tiet'], $rows ['thu2'], $rows ['thu3'], $rows ['thu4'], $rows ['thu5'], $rows ['thu6'], $rows ['thu7']);    
			$k++;
		} //End while
		
		
		$contents = viewtkb( $data_danhsach, $ext,$content,$submit);
	} else {
		$contents = theme_main_tkblop( $data_danhsach, $ext);
	}
include ( NV_ROOTDIR . "/includes/header.php" );
echo nv_site_theme( $contents );
include ( NV_ROOTDIR . "/includes/footer.php" );
