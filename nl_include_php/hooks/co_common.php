<?php
if (!defined('FORUM')) die();

// lang
global $lang_nl_include_php;
if (file_exists($ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php'))
		include $ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php';
else
		include $ext_info['path'].'/lang/English/'.$ext_info['id'].'.php';
