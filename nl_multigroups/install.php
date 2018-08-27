<?
if (!defined('FORUM')) die();

if (!$forum_db->field_exists('users', 'g_multi'))
	$forum_db->add_field('users', 'g_multi', 'VARCHAR(255)', false, '0');

if (!$forum_db->field_exists('groups', 'multigroups_type'))
	$forum_db->add_field('groups', 'multigroups_type', 'TINYINT(1)', true, '3');
