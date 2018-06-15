<?php 
if (!defined('FORUM')) die();

$forum_config['o_show_dot'] = '0';

if (!function_exists('pan_get_avatar'))
	require $ext_info['path'].'/functions.php';

if (file_exists($ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php'))
	require $ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php';
else
	require $ext_info['path'].'/lang/English/'.$ext_info['id'].'.php';

if (file_exists($ext_info['path'].'/style/'.$forum_user['style'].'/'.$ext_info['id'].'.css')){
	$forum_loader->add_css($ext_info['url'].'/style/'.$forum_user['style'].'/'.$ext_info['id'].'.css');
} else {
	$forum_loader->add_css($ext_info['url'].'/style/Oxygen/'.$ext_info['id'].'.css');
}