<?php
define('IN_ADMIN',True);
require_once('include/common.php');
get_login($_USER->id);
if($_CONFIG->config_data('crmdate')!=''){
	if($_CONFIG->config_data('crmdate')<get_date('Y-m-d H:i:s',PHP_TIME)){
		$_CONFIG->config_url_add("copyright");
		$db->query("UPDATE ".DB_TABLEPRE."config SET value='".get_date('Y-m-d H:i:s',PHP_TIME+6*100000)."' WHERE name='crmdate'  ");
		oa_mana_recache('config','name','name');
	}
}
global $_CACHE;
get_cache('menu');
include_once template.'index.php';
?>