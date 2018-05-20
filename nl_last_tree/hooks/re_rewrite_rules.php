<?
if (!defined('FORUM')) die();

$forum_rewrite_rules['/^last_tree[\/_-]?(\.html?|\/)?$/i'] = 'misc.php?section=last_tree';
$forum_rewrite_rules['/^last_tree[\/_-]?(p|page\/)([0-9]+)(\.html?|\/)?$/i'] = 'misc.php?section=last_tree&p=$2';
