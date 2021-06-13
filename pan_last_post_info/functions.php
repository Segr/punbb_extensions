<?php 

function pan_get_avatar($user_id, $user_avatar, $avatar_width, $avatar_height)
{
	global $forum_user, $ext_info;

	if (empty($avatar_width)) $avatar_width = 32;
	if (empty($avatar_height)) $avatar_height = 32;
	
	$avatar_markup = generate_avatar_markup($user_id, $user_avatar, $avatar_width, $avatar_height);
	
	if (strpos($avatar_markup, 'class="')!==false)
		$avatar_markup = str_replace('class="', 'class="list-avatar ', $avatar_markup);
	else
		$avatar_markup = str_replace('<img', '<img class="list-avatar"', $avatar_markup);

	if (empty($avatar_markup)) {
		if (is_file($ext_info['path'].'/style/'.$forum_user['style'].'/default_avatar.jpg'))
			return '<img class="list-avatar" src="'.$ext_info['url'].'/style/'.$forum_user['style'].'/default_avatar.jpg" />';
		else if(is_file($ext_info['path'].'/style/Oxygen/default_avatar.jpg'))
			return '<img class="list-avatar" src="'.$ext_info['url'].'/style/Oxygen/default_avatar.jpg" />';
	}
	
	return $avatar_markup;
}
