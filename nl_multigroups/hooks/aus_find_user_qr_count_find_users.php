<?
if (!defined('FORUM')) die();

$conditions = array_filter($conditions, function($condition){
	return strpos($condition, 'u.group_id=')===false ? $condition : '';
});

if ($user_group > -1)
	$conditions[] = '(u.group_id='.intval($user_group).' OR CONCAT(\',\', u.g_multi, \',\') LIKE \'%,'.intval($user_group).',%\')';

$query['WHERE'] = 'u.id>1' .(count($conditions)>0 ? ' AND ' : '') . implode(' AND ', $conditions);
