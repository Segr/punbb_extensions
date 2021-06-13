<?php 

if (!defined('FORUM')) die();

if (file_exists($ext_info['path'].'/style/'.$forum_user['style'].'/'.$ext_info['id'].'.css'))
	$forum_loader->add_css($ext_info['url'].'/style/'.$forum_user['style'].'/'.$ext_info['id'].'.css', array('type' => 'url', 'media' => 'screen'));
else
	$forum_loader->add_css($ext_info['url'].'/style/Oxygen/'.$ext_info['id'].'.css', array('type' => 'url', 'media' => 'screen'));

$forum_loader->add_js($ext_info['url'].'/js/'.$ext_info['id'].'.js', array(
	'type' 		=> 'url',
	'async' 	=> true
));


