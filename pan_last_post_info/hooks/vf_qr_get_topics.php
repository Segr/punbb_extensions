<?php 
if (!defined('FORUM')) die();

$query['SELECT'] .= ', u.id AS poster_id, u.avatar, u.avatar_width, u.avatar_height, t.last_post_id';
$query['JOINS'][] = array(
	'LEFT JOIN' => 'posts AS p',
	'ON'		=> '(p.id = t.last_post_id)'
);
$query['JOINS'][] = array(
	'LEFT JOIN' => 'users AS u',
	'ON'		=> '(u.id = p.poster_id)'
);