<?php
if (!defined('FORUM')) die();

forum_config_add('o_nl_gravatar',                    '1');
forum_config_add('o_nl_gravatar_width',              '60');
forum_config_add('o_nl_gravatar_default',            'identicon');
forum_config_add('o_nl_gravatar_guests',             '0');
forum_config_add('o_nl_gravatar_rating',             'all');
if ($forum_db->field_exists('user', 'gender')) {
	forum_config_add('o_nl_gravatar_default_image',  'extensions\/nl_gravatar\/images\/default_avatar_male.png');
	forum_config_add('o_nl_gravatar_default_image2', 'extensions\/nl_gravatar\/images\/default_avatar_female.png');
} else {
	forum_config_add('o_nl_gravatar_default_image',  'extensions\/nl_gravatar\/images\/default_avatar.png');
	forum_config_add('o_nl_gravatar_default_image2', 'extensions\/nl_gravatar\/images\/default_avatar.png');
}

$forum_db->add_field('users', 'nl_gravatar', 'TINYINT(1)', false, '1');