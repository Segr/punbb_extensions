<?php
if (!defined('FORUM')) die();

if ($ext['id'] == 'nl_include_php' && !isset($forum_page['ext_actions']['nl_include_php_settings'])) {
	$forum_page['ext_actions']['nl_include_php_settings'] = '<span><a href="'.forum_link($forum_url['admin_settings_features']).'#'.$ext_info['id'].'_settings'.'">'.$lang_nl_include_php['Go to settings'].'</a></span>';
}
