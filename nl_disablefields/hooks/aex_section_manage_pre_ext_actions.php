<?php
if (!defined('FORUM')) die();

if ($ext['id'] == 'nl_disablefields' && !isset($forum_page['ext_actions']['nl_disablefields_settings'])) {
	$forum_page['ext_actions']['nl_disablefields_settings'] = '<span><a href="'.forum_link($forum_url['admin_settings_features']).'#'.$ext_info['id'].'_settings'.'">'.$lang_nl_disablefields['Go to settings'].'</a></span>';
}
