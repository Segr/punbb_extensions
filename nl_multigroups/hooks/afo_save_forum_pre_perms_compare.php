<?
if (!defined('FORUM')) die();

$perms_old = $perms_new;

$query = array(
	'DELETE'	=> 'forum_perms',
	'WHERE'		=> 'group_id='.$cur_group['g_id'].' AND forum_id='.$forum_id
);
$forum_db->query_build($query) or error(__FILE__, __LINE__);

$query = array(
	'INSERT'	=> 'group_id, forum_id',
	'INTO'		=> 'forum_perms',
	'VALUES'	=> $cur_group['g_id'].', '.$forum_id
);

$query['INSERT'] .= ', '.implode(', ', array_keys($perms_new));
$query['VALUES'] .= ', '.implode(', ', array_values($perms_new));

$forum_db->query_build($query) or error(__FILE__, __LINE__);
