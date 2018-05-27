<?php
if (!defined('FORUM')) die();

$nl_userlist_avatar = (!empty($_POST['nl_userlist_avatar']) && $_POST['nl_userlist_avatar']==1);

if ($nl_userlist_avatar!=$user['nl_userlist_avatar']) {
	$query = array(
		'UPDATE'	=> 'users',
		'SET'		=> 'nl_userlist_avatar=\''.$nl_userlist_avatar.'\'',
		'WHERE'		=> 'id='.$id
	);
	$forum_db->query_build($query) or error(__FILE__, __LINE__);
}

$user['nl_userlist_avatar'] = $nl_userlist_avatar;