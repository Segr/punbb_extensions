<?php
if (!defined('FORUM')) die();

if (isset($user_data['nl_userlist_avatar']) && $user_data['nl_userlist_avatar']==1) {
	$avatar_markup = 
		'<a href="'.forum_link($forum_url['user'], $user_data['id']).'">'.
		generate_avatar_markup($user_data['id'], $user_data['avatar'], $forum_config['o_nl_userlist_avatar_size'], $forum_config['o_nl_userlist_avatar_size'], $user_data['username']).
		'</a>';
} else {
	$avatar_markup = "";
}
array_insert($forum_page['table_row'], 1, '<td class="tc'.(count($forum_page['table_row'])+1).'">'.$avatar_markup.'</td>', 'avatar');
