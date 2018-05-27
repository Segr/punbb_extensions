<?php
if (!defined('FORUM')) die();

if (!isset($form['nl_userlist_avatar']) || $form['nl_userlist_avatar'] != '1') {
	$form['nl_userlist_avatar'] = '0';
}	
if (isset($form['nl_userlist_avatar_size']) && !is_numeric($form['nl_userlist_avatar_size']) && $form['nl_userlist_avatar'] == '1') {
	$form['nl_gravatar_width'] = '60';
}
