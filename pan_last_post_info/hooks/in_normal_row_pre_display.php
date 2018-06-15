<?php 

if (!defined('FORUM')) die();

if ($cur_forum['last_post'] != '')
{
	if ($forum_user['g_view_users'] == '1' && $cur_forum['poster_id'] > 1)
	{
		$miniature = '<a title="'.sprintf($lang_pan_last_post_info['last_post_user'], forum_htmlencode($cur_forum['last_poster'])).'" href="'.forum_link($forum_url['user'], $cur_forum['poster_id']).'" target="_blank"><img src="'. pan_get_avatar($cur_forum['poster_id'], $cur_forum['avatar']) .'" class="list-avatar" /></a>';
		$last_post_user = '<span class="last-post-user"><a title="'.sprintf($lang_pan_last_post_info['last_post_user'], forum_htmlencode($cur_forum['last_poster'])).'" href="'.forum_link($forum_url['user'], $cur_forum['poster_id']).'" target="_blank">'.sprintf($lang_index['Last poster'], forum_htmlencode($cur_forum['last_poster'])).':</a></span>';
		
	}
	else
	{
		$miniature = '<img src="'. pan_get_avatar($cur_forum['poster_id'], $cur_forum['avatar']) .'" class="list-avatar" />';
		$last_post_user = '<span class="last-post-user">'.sprintf($lang_index['Last poster'], forum_htmlencode($cur_forum['last_poster'])).':</span>';
	}
	
	$forum_page['item_body']['info']['lastpost'] = '<li class="info-lastpost">'.$miniature.'<span class="last-post-title" title="'.$lang_pan_last_post_info['last_post_title'].'"><a href="'.forum_link($forum_url['topic'], array($cur_forum['tid'], sef_friendly($cur_forum['subject']))).'">'.forum_htmlencode($cur_forum['subject']).'</a></span> '.$last_post_user.' <span class="last-post-msg" title="'.$lang_pan_last_post_info['last_post_msg'].'"><a href="'.forum_link($forum_url['post'], $cur_forum['last_post_id']).'">'.format_time($cur_forum['last_post']).'</a></span></li>';
	
} else {
	
	$forum_page['item_body']['info']['lastpost'] = '<li class="info-lastpost"><strong>'.$lang_common['Never'].'</strong></li>';
}

