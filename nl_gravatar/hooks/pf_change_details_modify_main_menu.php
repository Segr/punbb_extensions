<?php
if (!defined('FORUM')) die();

// lang
global $lang_nl_gravatar;
if (!isset($lang_nl_gravatar)) {
	if (file_exists($ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php'))
		include $ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php';
	else
		include $ext_info['path'].'/lang/English/'.$ext_info['id'].'.php';
}
	
if ($forum_config['o_nl_gravatar'] == '1')
	$pfgravatar_splice = array('nl_gravatar'=>'<li'.(($section == 'nl_gravatar') ? ' class="active"' : '').'><a href="'.forum_link($forum_url['profile_nl_gravatar'], $id).'"><span>'.$lang_nl_gravatar['Gravatar'].'</span></a></li>');

$gravpos=3;
if ($forum_config['o_signatures'] == '1')
	$gravpos++;			
if ($forum_config['o_avatars'] == '1')
	$gravpos++;			
//tries to put gravatar before the adin menu item
array_splice($forum_page['main_menu'], $gravpos, 0, $pfgravatar_splice);

