<?php
if (!defined('FORUM')) die();

$new_config = array();
if (!array_key_exists('o_nl_gravatar',                    $forum_config)) $new_config[] = '\'o_nl_gravatar\',                \'1\'';
if (!array_key_exists('o_nl_gravatar_width',              $forum_config)) $new_config[] = '\'o_nl_gravatar_width\',          \'60\'';
if (!array_key_exists('o_nl_gravatar_default',            $forum_config)) $new_config[] = '\'o_nl_gravatar_default\',        \'identicon\'';
if (!array_key_exists('o_nl_gravatar_guests',             $forum_config)) $new_config[] = '\'o_nl_gravatar_guests\',         \'0\'';
if (!array_key_exists('o_nl_gravatar_rating',             $forum_config)) $new_config[] = '\'o_nl_gravatar_rating\',         \'all\'';
if ($forum_db->field_exists('user', 'gender')) {
	if (!array_key_exists('o_nl_gravatar_default_image',  $forum_config)) $new_config[] = '\'o_nl_gravatar_default_image\',  \'extensions\/nl_gravatar\/images\/default_avatar_male.png\'';
	if (!array_key_exists('o_nl_gravatar_default_image2', $forum_config)) $new_config[] = '\'o_nl_gravatar_default_image2\', \'extensions\/nl_gravatar\/images\/default_avatar_female.png\'';
} else {
	if (!array_key_exists('o_nl_gravatar_default_image',  $forum_config)) $new_config[] = '\'o_nl_gravatar_default_image\',  \'extensions\/nl_gravatar\/images\/default_avatar.png\'';
	if (!array_key_exists('o_nl_gravatar_default_image2', $forum_config)) $new_config[] = '\'o_nl_gravatar_default_image2\', \'extensions\/nl_gravatar\/images\/default_avatar.png\'';
}

if (!empty($new_config)) {
	$query = array(
		'INSERT'	=> 'conf_name, conf_value',
		'INTO'		=> 'config',
		'VALUES'	=> $new_config
	);
	$forum_db->query_build($query) or error(__FILE__, __LINE__);
}
unset($new_config);

$forum_db->add_field('users', 'nl_gravatar', 'TINYINT(1)', false, '1');
