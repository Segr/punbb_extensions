<?php
if (!defined('FORUM')) die();
global $forum_config;

if (!array_key_exists('o_nl_userlist_avatar',      $forum_config)) forum_config_add('o_nl_userlist_avatar',      '1');
if (!array_key_exists('o_nl_userlist_avatar_size', $forum_config)) forum_config_add('o_nl_userlist_avatar_size', '60');

$forum_db->add_field('users', 'nl_userlist_avatar', 'TINYINT(1)', FALSE, 1);
