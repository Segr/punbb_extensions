<?
if (!defined('FORUM')) die();

if ($forum_db->field_exists('users', 'g_multi'))
	$forum_db->drop_field('users', 'g_multi');

if ($forum_db->field_exists('groups', 'multigroups_type'))
	$forum_db->drop_field('groups', 'multigroups_type');

