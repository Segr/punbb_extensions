<?php
if (!defined('FORUM')) die();

if (!isset($form['nl_gravatar']) || $form['nl_gravatar'] != '1') {
	$form['nl_gravatar'] = '0';
}	
if (isset($form['nl_gravatar_width']) && !is_numeric($form['nl_gravatar_width']) && $form['nl_gravatar'] == '1') {
	$form['nl_gravatar_width'] = '60';
}
if (!isset($form['nl_gravatar_guests']) || $form['nl_gravatar_guests'] != '1') {
	$form['nl_gravatar_guests'] = '0';
}
