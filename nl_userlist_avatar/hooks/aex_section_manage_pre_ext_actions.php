<?php
if (!defined('FORUM')) die();

if ($ext['id'] == 'nl_userlist_avatar' && !isset($forum_page['ext_actions']['nl_userlist_avatar_settings'])) {
	$forum_page['ext_actions']['nl_userlist_avatar_settings'] = '<span><a href="'.forum_link($forum_url['admin_settings_features']).'#'.$ext_info['id'].'_settings'.'">'.$lang_nl_userlist_avatar['Go to settings'].'</a></span>';
}
