<?php
if (!defined('FORUM')) die();

$nl_gravatar = 0;

$query = array(
	'UPDATE'	=> 'users',
	'SET'		=> 'nl_gravatar=\''.$nl_gravatar.'\'',
	'WHERE'		=> 'id='.$id
);
$forum_db->query_build($query) or error(__FILE__, __LINE__);

$user['nl_gravatar'] = $nl_gravatar;