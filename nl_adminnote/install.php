<?
if (!defined('FORUM')) die();

$data = $forum_db->fetch_assoc($forum_db->query_build(array(
	'SELECT'	=> 'character_maximum_length',
	'FROM'		=> 'information_schema.columns',
	'WHERE'		=> "table_schema='{$db_name}' AND table_name='{$db_prefix}users' AND column_name='admin_note'",
	'PARAMS'    => array('NO_PREFIX' => 1),
)));

if ($data['character_maximum_length']<300) {
	$forum_db->query("ALTER TABLE `{$db_prefix}users` CHANGE `admin_note` `admin_note` VARCHAR(300);");
}


