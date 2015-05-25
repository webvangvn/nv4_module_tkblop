<?php
/**
 * @Author GaNguCay (gangucay@gmail.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @copyright Freeware
 * @createdate 11/08/2010
 */

if (! defined ( 'NV_IS_FILE_ADMIN' ))
	die ( 'Stop!!!' );
$page_title = $lang_module ['edit_tkb'];
	$lop = $nv_Request->get_string('lop', 'get');
	$sql = "SELECT id,tiet,thu2,thu3,thu4,thu5,thu6,thu7 FROM " . NV_PREFIXLANG . "_" . $module_data . " WHERE (lop LIKE '$lop') ORDER BY tiet ASC";
	$result = $db->query( $sql ) or die ('Đã có lỗi xảy ra trong lệnh truy vấn CSDL.<br />'.$lop);
	$monhoc=array();
	$tieude_arr=array('Tiết','Thứ 2','Thứ 3','Thứ 4','Thứ 5','Thứ 6','Thứ 7');
	$contents .= "<div><b><br /><font size='3' color='blue'>THỜI KHOÁ BIỂU LỚP ".$lop."<br /></font></b></div>";
	$contents .= "<form name='edit_tkb' action='index.php?nv=tkblop&op=quanli' method='post'>";
	$contents .= "<div>";
	$k=0;
	$datatkb=array();
	while ($rows = $result->fetch()){
	$datatkb[$k]=array($rows['id'],$rows['tiet'], $rows ['thu2'], $rows ['thu3'], $rows ['thu4'], $rows ['thu5'], $rows ['thu6'], $rows ['thu7']);    
	$k++;
	} //End while
	$k=0;
	foreach($datatkb as $rows){
		if($rows[1]==1 or $rows[1]==6){
			// Hien thi tieu de TKB
			$contents .= "<br />";
			for($i = 0; $i < 7; $i ++) {
				$contents .= "<input style='text-align: center; color: green'type='text' size='12' value='".$tieude_arr[$i]."' disabled>";
			}
			$contents .= "<br />";
		} // End IF
		// Hien thi cac tiet
		
		for($j = 0; $j < 8; $j ++) {
		$text=($j==0?"hidden":"text");
			if($j==1){
				$contents .= "<input style='text-align: center' name='monhoc_".$k."_".$j."' type='text' size='12' value='".$rows[$j]."' disabled>";
			}else{
			$contents .= "<input style='text-align: center' name='monhoc_".$k."_".$j."' type='".$text."' size='12' value='".$rows[$j]."'>";
			}
		}
		$contents .= "<br />";
	$k++;
	} //End while
	$contents .= "</div>";
	$contents .= "<div><br /><input type='submit' value='" . $lang_module['update'] . "' name='submit'></div>";
	$contents .= "</form>";
include (NV_ROOTDIR . "/includes/header.php");
echo nv_admin_theme ( $contents );
include (NV_ROOTDIR . "/includes/footer.php");
