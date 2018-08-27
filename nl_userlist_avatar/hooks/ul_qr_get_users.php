<?php
if (!defined('FORUM')) die();

if (strpos($query['SELECT'], 'u.avatar')===false ) 
	$query['SELECT'] .= ', u.avatar';
$query['SELECT'] .= ', u.nl_userlist_avatar';