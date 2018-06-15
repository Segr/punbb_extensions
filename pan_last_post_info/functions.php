<?php 

function pan_get_avatar($user_id, $user_avatar)
{
	global $base_url, $forum_config, $forum_user, $ext_info;

	switch ($user_avatar)
	{
	case FORUM_AVATAR_GIF:
		$avatar_filename = $user_id.'.gif';
		break;

	case FORUM_AVATAR_JPG:
		$avatar_filename = $user_id.'.jpg';
		break;

	case FORUM_AVATAR_PNG:
		$avatar_filename = $user_id.'.png';
		break;
	}

	if (!isset($avatar_filename))
	{
		if(is_dir($ext_info['url'].'/style/'.$forum_user['style'].'/'))
			$user_style = $forum_user['style'];
		else
			$user_style = 'Oxygen';

		return $ext_info['url'].'/style/'.$user_style.'/default_avatar.jpg';
	} else {
		return $base_url .'/'. $forum_config['o_avatars_dir'] .'/'.$avatar_filename;
	}
}
