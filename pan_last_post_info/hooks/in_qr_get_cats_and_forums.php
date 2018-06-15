<?php 
if (!defined('FORUM')) die();

$query['SELECT'] .= ', t.id AS tid, t.subject, u.id AS poster_id, u.avatar, u.avatar_width, u.avatar_height';
$query['JOINS'][] = array(
	'LEFT JOIN' => 'posts AS p',
	'ON'		=> 'p.id=f.last_post_id'
);
$query['JOINS'][] = array(
	'LEFT JOIN' => 'users AS u',
	'ON'		=> 'u.id=p.poster_id'
);
$query['JOINS'][] = array(
	'LEFT JOIN' => 'topics AS t',
	'ON'		=> 't.last_post_id=f.last_post_id'
);
