<?php
/**
 * @Author GaNguCay (gangucay@gmail.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @copyright Freeware
 * @createdate 11/08/2010
 */

include (NV_ROOTDIR . "/includes/class/geturl.class.php");
$getContent = new UrlGetContents ();

creat_config ( 'config' );

$data = file_get_contents ( NV_ROOTDIR . '/modules/tkblop/config.txt' );
$ex = explode ( '|', $data );
$fix = array ();
$fix ['tieudeTKB'] = $ex [0]; 	//Tiêu đề của TKB lớp
$fix ['apdung'] = $ex [1]; 		//Ngày áp dụng
$fix ['vaohoc_AM'] = $ex [2]; 	//Giờ vào học buổi sáng
$fix ['vaohoc_PM'] = $ex [3]; 	//Giờ vào học buổi chiều
	