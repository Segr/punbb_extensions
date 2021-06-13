<?php
if (!defined('FORUM')) die();

// lang
global $lang_nl_disablefields;
if (file_exists($ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php'))
	include $ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php';
else
	include $ext_info['path'].'/lang/English/'.$ext_info['id'].'.php';

global $lang_profile;
if (file_exists(FORUM_ROOT.'/lang/'.$forum_user['language'].'/profile.php'))
	include FORUM_ROOT.'/lang/'.$forum_user['language'].'/profile.php';
else
	include FORUM_ROOT.'/lang/English/profile.php';

$nl_disablefields_options = array(
	'nl_disablefields_url'       => $lang_profile['Website'],
	'nl_disablefields_facebook'  => $lang_profile['Facebook'],
	'nl_disablefields_twitter'   => $lang_profile['Twitter'],
	'nl_disablefields_linkedin'  => $lang_profile['LinkedIn'],
	'nl_disablefields_jabber'    => $lang_profile['Jabber'],
	'nl_disablefields_skype'     => $lang_profile['Skype'],
	'nl_disablefields_msn'       => $lang_profile['MSN'],
	'nl_disablefields_icq'       => $lang_profile['ICQ'],
	'nl_disablefields_aim'       => $lang_profile['AOL IM'],
	'nl_disablefields_yahoo'     => $lang_profile['Yahoo'],
);