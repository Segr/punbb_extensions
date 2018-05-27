<?php
if (!defined('FORUM')) die();

forum_config_add('o_nl_userlist_avatar',      '1');
forum_config_add('o_nl_userlist_avatar_size', '60');

$forum_db->add_field('users', 'nl_userlist_avatar', 'TINYINT(1)', FALSE, 1);
