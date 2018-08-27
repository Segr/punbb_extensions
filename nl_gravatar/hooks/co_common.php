<?php
if (!defined('FORUM')) die();

define('NL_GRAVATAR_USER_HAS_GENDER', $forum_db->field_exists('users', 'gender'));

global $lang_nl_gravatar;
if (file_exists($ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php'))
	include $ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php';
else
	include $ext_info['path'].'/lang/English/'.$ext_info['id'].'.php';
