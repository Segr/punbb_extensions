<?
if (!defined('FORUM')) die();

$multigroups_type1 = forum_trim($_POST['multigroups_type1']);
$multigroups_type2 = forum_trim($_POST['multigroups_type2']);

if ($group_id<5) $multigroups_type1 = 1;

$multigroups_type = (int)$multigroups_type1*1 + (int)$multigroups_type2*2;

$query['SET'] .= ', multigroups_type = \''.$forum_db->escape($multigroups_type).'\'';