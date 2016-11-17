<?php
define('IN_ADMIN',True);
require_once('include/common.php');
get_login($_USER->id);
if(!is_superadmin()){
if ($_CONFIG->config_data('opendate')<=get_date('H',PHP_TIME) &&$_CONFIG->config_data('enddate')<=get_date('H',PHP_TIME)){
exit('对不起，系统被管理员关闭，开启时间为'.$_CONFIG->config_data('opendate').'点到'.$_CONFIG->config_data('enddate').'点');
}else{
if ($_CONFIG->config_data('configflag')=='0'){
exit('对不起，系统被管理员关闭，请联系管理员！<br>关闭原因：'.$_CONFIG->config_data('closereason'));
}
}
}
if ($_GET[fileurl]!=""){
$fileurl=$_GET[fileurl];
}else{
$fileurl="home";
}
define('ADMIN_ROOT',TOA_ROOT.$fileurl.'/');
initGP(array('ac','do'));
empty($ac) &&$ac = 'index';
if ( !eregi('[a-z_]',$ac) ) $ac = 'index';
if($fileurl=="ilohamail"){
echo '<script>location.href="'.$ac.'?oausername='.$_GET[oausername].'";</script>';
exit;
}
if($fileurl=="home"){
echo '<script>location.href="index.php";</script>';
exit;
}
require_once('include/function_'.$fileurl.'.php');
if ( file_exists(ADMIN_ROOT."mod_{$ac}.php") ) {
require_once(ADMIN_ROOT.'./mod_'.$ac.'.php');
}else {
exit;
}
echo '<div style="display:none;">
<script type="text/javascript">
var _bdhmProtocol = (("https:" == document.location.protocol) ? " https://" : " http://");
document.write(unescape("%3Cscript src=" + _bdhmProtocol + "hm.baidu.com/h.js%3F569322d6eae0bb12f168b4701cc26f09 type=text/javascript %3E%3C/script%3E"));
</script></div>';
?>