<?
if (!defined('FORUM')) die();

if ($forum_user['g_moderator'] != '1' && $user['g_id'] == FORUM_ADMIN ) {
	$forum_page['user_management'][] = '';
	$forum_page['own_profile'] = false;
}
