<?php
/**
 * @Author GaNguCay (gangucay@gmail.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @copyright Freeware
 * @createdate 11/08/2010
 */

if (! defined ( 'NV_IS_FILE_ADMIN' ))
	die ( 'Stop!!!' );
$page_title = $lang_module ['import'];
if ($nv_Request->isset_request ( 'do', 'post' )) {
	$data = array();
	if ( $_FILES['ufile']['tmp_name'] )  
	{  
		//$contents="".$_FILES['ufile']['tmp_name']."";
	    $dom = DOMDocument::load( $_FILES['ufile']['tmp_name'] );  
	    $rows = $dom->getElementsByTagName( 'Row' );  
		$tde=array();
		$line=0;
		$them=0;
		$sua=0;
		foreach ($rows as $row){ 
		$cells = $row->getElementsByTagName( 'Cell' );  
		$datarow = array();  
			foreach ($cells as $cell){  
	     		if ($line==0){
	        		$tde[]=$cell->nodeValue;
	     		}else{
	     			$datarow []= $cell->nodeValue;
	     		} 
		 	}  
		$data []= $datarow;  
		$line=$line+1;      
		}
//
	foreach( $data as $row ) {  
		$tkblop=array();
		$i=0;
		if (isset($row[0])){
			foreach( $row as $item ) {
			//chen vo CSDL
				$tkblop[$i]=$item;
				$i=$i+1;	
			} 
		   if( $tkblop[0]!="" and $tkblop[1]!="" and $tkblop[2]!="") {
				$from=NV_PREFIXLANG . "_" . $module_data;
				$where="id='". $tkblop[0]."'";
				$db->sqlreset()->select( 'COUNT(*)' )->from( $from )->where( $where );
				$numrows = $db->query( $db->sql() )->fetchColumn();
				if(!$numrows) {
					$sql = "INSERT INTO " . NV_PREFIXLANG . "_" . $module_data . " ( id , lop , tiet , thu2 , thu3 , thu4 , thu5 , thu6 , thu7 ) VALUES (
					:id,
					:lop,
					:tiet,
					:thu2,
					:thu3,
					:thu4,
					:thu5,
					:thu6,
					:thu7
					)";
					$data_insert = array();

					$data_insert['id'] = $tkblop[0];
					$data_insert['lop'] = $tkblop[1];
					$data_insert['tiet'] = $tkblop[2];
					$data_insert['thu2'] = $tkblop[3];
					$data_insert['thu3'] = $tkblop[4];
					$data_insert['thu4'] = $tkblop[5];
					$data_insert['thu5'] = $tkblop[6];
					$data_insert['thu6'] = $tkblop[7];
					$data_insert['thu7'] = $tkblop[8];
					$db->insert_id( $sql, 'id', $data_insert );
					$them=$them+1;
				}else{
					$ct_query = array();
					$sth = $db->prepare( 'UPDATE ' . NV_PREFIXLANG . '_' . $module_data . ' SET
						id=:id,
						lop=:lop,
						tiet=:tiet,
						thu2=:thu2,
						thu3=:thu3,
						thu4=:thu4,
						thu5=:thu5,
						thu6=:thu6,
						thu7=:thu7
					WHERE id =' . $tkblop[0] );

					$sth->bindParam( ':id', $tkblop[0], PDO::PARAM_STR );
					$sth->bindParam( ':lop', $tkblop[1], PDO::PARAM_STR );
					$sth->bindParam( ':tiet', $tkblop[2], PDO::PARAM_STR );
					$sth->bindParam( ':thu2', $tkblop[3], PDO::PARAM_STR );
					$sth->bindParam( ':thu3', $tkblop[4], PDO::PARAM_STR );
					$sth->bindParam( ':thu4', $tkblop[5], PDO::PARAM_STR );
					$sth->bindParam( ':thu5', $tkblop[6], PDO::PARAM_STR );
					$sth->bindParam( ':thu6', $tkblop[7], PDO::PARAM_STR );
					$sth->bindParam( ':thu7', $tkblop[8], PDO::PARAM_STR );

					$ct_query[] = ( int )$sth->execute();
					$sua=$sua+1;
				}
			}
		}  
	}
	$line=$line-1;
	//Hien thi thong bao sau khi import
	$contents .= "<div class=\"quote\" style=\"width:780px;\">\n";
    $contents .= "<blockquote class=\"error\"><span>" . $lang_module['import_success'] . "</span></blockquote>\n";
    $contents .= "</div><br>";
    $contents .= "<div class=\"clear\"></div>\n";
    $contents .= "<div id=\"list_mods\"
	<form id=\"form1\" name=\"form1\" method=\"post\">
	<table class=\"tab1\">
	<tr>
		<td class=\"fr\">" . $lang_module['line'] . "" . $line. "<br></td>
	</tr>
	<tr>
		<td class=\"fr\">" . $lang_module['them'] . "" . $them. "<br></td>
	</tr>
	<tr>
		<td class=\"fr\">" . $lang_module['sua'] . "" . $sua. "<br></td>
	</tr>
	</table>
	</form></div>";
}
}else
{
$contents .= "<form enctype=\"multipart/form-data\" id=\"form1\" name=\"form1\" method=\"post\">
<table class=\"tab1\">
	<tr>
		<td class=\"fr\" align=\"center\"><b> ". $lang_module ['luuyimp'] . "</b></td>
	</tr>
	<tr>
		<td class=\"fr\"  align=\"center\"><input type=\"file\" name=\"ufile\" size = 35 id=\"ufile\"/>
		<input type=\"submit\" name=\"do\" id=\"do\" value=\"Import\" /></td>
	</tr>
</table>
</form>";
}
include (NV_ROOTDIR . "/includes/header.php");
echo nv_admin_theme ( $contents );
include (NV_ROOTDIR . "/includes/footer.php");
?>
