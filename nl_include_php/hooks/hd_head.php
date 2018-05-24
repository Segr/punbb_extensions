<?php
if (!defined('FORUM')) die();

if (!defined('FORUM_PARSER_LOADED'))
	require FORUM_ROOT.'include/parser.php';
$forum_loader->add_css($ext_info['url'].'/css/'.$forum_user['style'].'/'.$ext_info['id'].'.css', array('type' => 'url', 'weight' => '90', 'media' => 'screen'));
