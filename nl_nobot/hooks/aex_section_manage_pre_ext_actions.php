<?php
if (!defined('FORUM')) die();

if ($ext['id'] == 'nl_nobot' && !isset($forum_page['ext_actions']['nl_nobot_settings'])) {
	$forum_page['ext_actions']['nl_nobot_settings'] = '<span><a href="'.forum_link($forum_url['admin_settings_features']).'#'.$ext_info['id'].'_settings'.'">'.$lang_nl_nobot['Go to settings'].'</a></span>';
}
