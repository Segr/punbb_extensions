<?php
if (!defined('FORUM')) die();

$query = array(
	'DELETE'	=> 'config',
	'WHERE'		=> 'conf_name = \'o_nl_gravatar%\''
);
$forum_db->query_build($query) or error(__FILE__, __LINE__);

$forum_db->drop_field('users', 'nl_gravatar');
