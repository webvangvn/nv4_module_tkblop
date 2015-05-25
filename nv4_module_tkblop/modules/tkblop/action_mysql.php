<?php

/**
 * @Author GaNguCay (gangucay@gmail.com)
 * @Update to 4.x webvang (hoang.nguyen@webvang.vn)
 * @copyright Freeware
 * @createdate 11/08/2010
 */

if ( ! defined( 'NV_IS_FILE_MODULES' ) ) die( 'Stop!!!' );

$sql_drop_module = array();

$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . "";

$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . " (
  id INT(4) NOT NULL auto_increment,
  lop varchar(6) NOT NULL,
  tiet INT(2) NOT NULL,
  thu2 varchar(15) NULL,
  thu3 varchar(15) NULL,
  thu4 varchar(15) NULL,
  thu5 varchar(15) NULL,
  thu6 varchar(15) NULL,
  thu7 varchar(15) NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8";
?>