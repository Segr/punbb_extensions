<?php
if (!defined('FORUM')) die();

forum_config_remove(array(
	'o_nl_userlist_avatar',
	'o_nl_userlist_avatar_size',
));

$forum_db->drop_field('users', 'nl_gravatar');
