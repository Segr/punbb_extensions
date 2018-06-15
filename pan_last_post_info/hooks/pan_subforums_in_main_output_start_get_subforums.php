<?php 
if (!defined('FORUM')) die();

$query['SELECT'] .= ', t.id AS tid, t.subject, p.poster_id, u.avatar, u.avatar_width, u.avatar_height';
$query['JOINS'][] = array(
	'LEFT JOIN'		=> 'topics AS t',
	'ON'			=> 't.forum_id=f.id'
);
$query['JOINS'][] = array(
	'LEFT JOIN'		=> 'posts AS p',
	'ON'			=> 'p.topic_id=t.id'
);
$query['JOINS'][] = array(
	'LEFT JOIN'		=> 'users AS u',
	'ON'			=> 'u.id=p.poster_id'
);
