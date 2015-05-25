<?php

/**
 * @Author GaNguCay (gangucay@gmail.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @copyright Freeware
 * @createdate 11/08/2010
 */
if ( ! defined( 'NV_IS_FILE_ADMIN' ) ) die( 'Stop!!!' );
$page_title = $lang_module['quanli'];
	$dellop = $nv_Request->get_string('dellop', 'get');
	
	$tbupdate="";	//Thong bao cap nhat du lieu
	// Update  lai CSDL
	if ($nv_Request->isset_request ( 'submit', 'post' )) {
		For ($i=0; $i<10; $i++){
			$ct_query = array();
			$monhoc2 = $nv_Request->get_title('monhoc_'.$i.'_2','post','');
			$monhoc3 = $nv_Request->get_title('monhoc_'.$i.'_3','post','');
			$monhoc4 = $nv_Request->get_title('monhoc_'.$i.'_4','post','');
			$monhoc5 = $nv_Request->get_title('monhoc_'.$i.'_5','post','');
			$monhoc6 = $nv_Request->get_title('monhoc_'.$i.'_6','post','');
			$monhoc7 = $nv_Request->get_title('monhoc_'.$i.'_7','post','');
			
			$sth = $db->prepare( 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . ' SET
				thu2=:thu2,
				thu3=:thu3,
				thu4=:thu4,
				thu5=:thu5,
				thu6=:thu6,
				thu7=:thu7
			WHERE id =' . $nv_Request->get_int('monhoc_'.$i.'_0','post','') );
			$sth->bindParam( ':thu2', $monhoc2, PDO::PARAM_STR );
			$sth->bindParam( ':thu3', $monhoc3, PDO::PARAM_STR );
			$sth->bindParam( ':thu4', $monhoc4, PDO::PARAM_STR );
			$sth->bindParam( ':thu5', $monhoc5, PDO::PARAM_STR );
			$sth->bindParam( ':thu6', $monhoc6, PDO::PARAM_STR );
			$sth->bindParam( ':thu7', $monhoc7, PDO::PARAM_STR );

			$ct_query=$sth->execute();
			
		}
	$tbupdate .= "<div class=\"quote\" style=\"width:780px;\">\n";
    $tbupdate .= "<blockquote class=\"error\"><span>" . $lang_module['edit_tkb_su'] . "</span></blockquote>\n";
    $tbupdate .= "</div>\n";
	}//End IF
	
	if(!empty($dellop)){
		//Xoa TKB giao vien
		$sql="DELETE FROM " . NV_PREFIXLANG . "_" . $module_data . " WHERE (lop LIKE '".$dellop."')";
		//die ($sql);
		$result =$db->query($sql);
	}//End IF

$sql = "SELECT DISTINCT lop FROM " . NV_PREFIXLANG . "_" . $module_data . " ORDER BY lop ASC";
$result = $db->query( $sql );
$num = $result->rowCount();

if ( $num > 0 )
{
	$contents .= "<div>";
    $contents .= "<form name=\"deltkb\" action=\"\" method=\"post\">";
    $contents .= "<table summary=\"\" class=\"tab1\">\n";
    $contents .= "<td>";
    $contents .= "<center><b><font color=blue size=\"3\">" . $lang_module['quanli_hd'] . "</font></b></center>";
    $contents .= "</td>\n";
    $contents .= "</table>";
	$contents .= "</form>";
    $contents .= "</div>";
    // Hien thi thong bao neu co cap nhat du lieu
	if ($nv_Request->isset_request ( 'submit', 'post' )) {
		$contents .="".$tbupdate."";
	}
	// Hien thi thong bao neu co xoa du lieu TKB
	if(!empty($dellop)){
		$contents .= "<div class=\"quote\" style=\"width:780px;\">\n";
    	$contents .= "<blockquote class=\"error\"><span>" . $lang_module['delsctkbgv'] . "</span></blockquote>\n";
    	$contents .= "</div>\n";
	}//End IF

    $contents .= "<table class=\"tab1\">\n";
    $contents .= "<thead>\n";
    $contents .= "<tr>\n";
    $contents .= "<td align=\"center\">" . $lang_module['stt'] . "</td>\n";
    $contents .= "<td align=\"center\">" . $lang_module['lop'] . "</td>\n";
    $contents .= "<td align=\"center\">" . $lang_module['quanli'] . "</td>\n";
    $contents .= "</tr>\n";
    $contents .= "</thead>\n";
    $a = 0;
    $b=1;
	
    while ( $row = $result->fetch() )
    {
        $class = ( $a % 2 ) ? " class=\"second\"" : "";
        $contents .= "<tbody" . $class . ">\n";
        $contents .= "<tr>\n";
        $contents .= "<td align=\"center\">" . $b. "</td>\n";
        $contents .= "<td align=\"center\">" . $row['lop'] . "</td>\n";
        $contents .= "<td align=\"center\"><span class=\"edit_icon\"><a href=\"index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=edit_tkb&amp;lop=" . $row['lop'] . "\">" . $lang_global['edit'] . "</a></span>\n";
        $contents .= "&nbsp;-&nbsp;<span class=\"delete_icon\"><a href=\"index.php?" . NV_NAME_VARIABLE . "=" . $module_name . "&" . NV_OP_VARIABLE . "=quanli&amp;dellop=" . $row['lop'] . "\">" . $lang_global['delete'] . "</a></span></td>\n";
        $contents .= "</tr>\n";
        $contents .= "</tbody>\n";
        $a ++;
        $b ++;
    }
    $contents .= "</table>\n";
    include ( NV_ROOTDIR . "/includes/header.php" );
    echo nv_admin_theme( $contents );
    include ( NV_ROOTDIR . "/includes/footer.php" );
}
else
{
	$contents .= "<div id='edit'></div>\n";
	$contents .= "<div class=\"quote\" style=\"width:780px;\">\n";
	$contents .= "<blockquote class='error'><span id='message'>" . $lang_module ['quanli_err'] . "</span></blockquote>\n";
	$contents .= "</div>\n";
	include (NV_ROOTDIR . "/includes/header.php");
	echo nv_admin_theme ( $contents);
	include (NV_ROOTDIR . "/includes/footer.php");
}
