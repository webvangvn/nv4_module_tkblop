<?php

/**
 * @Author GaNguCay (gangucay@gmail.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @copyright Freeware
 * @createdate 11/08/2010
 */

if ( ! defined( 'NV_IS_MOD_TKBLOP' ) ) die( 'Stop!!!' );

function theme_main_tkblop( $data_danhsach, $ext)
{
    global $global_config, $lang_module, $module_info, $module_name, $module_file, $lang_global;
    $xtpl = new XTemplate( "main.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/tkblop/" );
    $xtpl->assign( 'LANG', $lang_module );
    $xtpl->assign( 'CAUHINH', $ext );
if ( ! empty( $data_danhsach) )
    {
       foreach ( $data_danhsach as $lop){
       $xtpl->assign( 'LOP', $lop);
       $xtpl->parse('main.block_table.loop_ds');
       }
    }
    $xtpl->parse('main.block_table');
    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}

function viewtkb ( $data_danhsach, $ext, $content,$submit)
{
	    global $global_config, $lang_module, $module_info, $module_name;
    
    $xtpl = new XTemplate( "main.tpl", NV_ROOTDIR . "/themes/" . $module_info['template'] . "/modules/tkblop/" );
    $xtpl->assign( 'LANG', $lang_module );
    $xtpl->assign( 'CAUHINH', $ext );
    $xtpl->assign( 'LOPCHON', $submit );
    if ( ! empty( $data_danhsach) )
    {
       foreach ( $data_danhsach as $lop){
       $xtpl->assign( 'LOP', $lop);
       $xtpl->parse('main.block_table.loop_ds');
       }
    }
    if ( ! empty( $content) )
    {  
	   $xtpl->parse('main.block_tablekq.block_search.block_tieude');
       foreach ( $content as $value){
       	   if ($value[0]<=5){
       	   	   if ($value[0]==1){
       	   	   	    $xtpl->assign( 'BUOI', "CA SÁNG");
       	   	   	    $xtpl->parse('main.block_tablekq.block_search.block_ca');
       	   	   	    $xtpl->assign('TIET', $value);
			        $xtpl->parse('main.block_tablekq.block_search.block_ca.loop_kq');
			        $xtpl->parse('main.block_tablekq.block_search');
       	   	   } elseif ($value[0]==5){
       	   	   	   if(count($content)>5){
				       $xtpl->assign('TIET', $value);
				       $xtpl->parse('main.block_tablekq.block_search.block_ca.loop_kq');
				       $xtpl->parse('main.block_tablekq.block_search');
				       $xtpl->parse('main.block_tablekq');
			       }else{
				       $xtpl->assign('TIET', $value);
				       $xtpl->parse('main.block_tablekq.block_search.block_ca.loop_kq');
				       $xtpl->parse('main.block_tablekq.block_search');
			       }
       	   	   }else{
		       $xtpl->assign('TIET', $value);
		       $xtpl->parse('main.block_tablekq.block_search.block_ca.loop_kq');
		       $xtpl->parse('main.block_tablekq.block_search');
		       }
       	   } else {
       	   	   if ($value[0]==6){
       	   	   	    $xtpl->assign( 'BUOI', "CA CHIỀU");
       	   	   	    $xtpl->parse('main.block_tablekq.block_search.block_ca');
       	   	   }
	       $xtpl->assign('TIET', $value);
	       $xtpl->parse('main.block_tablekq.block_search.block_ca.loop_kq');
	       $xtpl->parse('main.block_tablekq.block_search');       	   
       	   }
       }

    }
    $xtpl->parse('main.block_tablekq');
	$xtpl->parse('main.block_table');
	$xtpl->parse('main.block_thongbao');
    $xtpl->parse( 'main' );
    return $xtpl->text( 'main' );
}
