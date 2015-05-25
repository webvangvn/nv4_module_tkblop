<?php 

/**
 * @Author Webvang (hoang.nguyen@webvang.vn)
 * @copyright Webvang.vn
 * @createdate 25/05/2015
 */

if ( ! defined( 'NV_ADMIN' ) or ! defined( 'NV_MAINFILE' ) or ! defined( 'NV_IS_MODADMIN' ) ) die( 'Stop!!!' );
$submenu['config'] = $lang_module['config'];
$submenu['import'] = $lang_module['import'];
$submenu['del'] = $lang_module['del'];
$submenu['quanli'] = $lang_module['quanli'];
$allow_func = array( 'main', 'del', 'config', 'import','quanli','edit_tkb');