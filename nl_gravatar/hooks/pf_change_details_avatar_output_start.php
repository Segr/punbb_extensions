<?php
if (!defined('FORUM')) die();

$gr_site = 'http://www.gravatar.com';

if (strpos($forum_page['avatar_markup'], $gr_site)!==false) {
	$lang_profile['Current avatar'] = $lang_nl_gravatar['Current avatar'];
	$lang_profile['Delete avatar info'] = $lang_nl_gravatar['Delete avatar info'];
}
