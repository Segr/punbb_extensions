<?php
if (!defined('FORUM')) die();

if ($ext['id'] == 'nl_gravatar' && !isset($forum_page['ext_actions']['nl_gravatar_settings'])) {
	$forum_page['ext_actions']['nl_gravatar_settings'] = '<span><a href="'.forum_link($forum_url['admin_settings_features']).'#'.$ext_info['id'].'_settings'.'">'.$lang_nl_gravatar['Go to settings'].'</a></span>';
}
