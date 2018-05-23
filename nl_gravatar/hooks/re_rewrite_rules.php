<?
if (!defined('FORUM')) die();

$forum_rewrite_rules['/^user[\/_-]?([0-9]+)[\/_-]?(nl_gravatar)(\.html?|\/)?$/i'] = 'profile.php?section=nl_gravatar&id=$1';
