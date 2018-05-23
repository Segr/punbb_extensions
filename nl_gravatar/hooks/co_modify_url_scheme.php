<?
if (!defined('FORUM')) die();

if (file_exists($ext_info['path'].'/url/'.$forum_config['o_sef'].'.php')) {
	require_once $ext_info['path'].'/url/'.$forum_config['o_sef'].'.php';
} else {
	require_once $ext_info['path'].'/url/Default.php';
}