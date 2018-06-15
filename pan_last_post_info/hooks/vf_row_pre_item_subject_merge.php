<?php 
if (!defined('FORUM')) die();

if ($cur_topic['moved_to'] == null) {
	$avatar = '<a href="'.forum_link($forum_url['user'], $cur_topic['poster_id']).'">'.pan_get_avatar($cur_topic['poster_id'], $cur_topic['avatar'], $cur_forum['avatar_width'], $cur_forum['avatar_height']).'</a>';

	$forum_page['item_body']['info']['lastpost'] =  str_replace('<span class="label">'.$lang_forum['Last post'].'</span>', ''."\n".'<div class="ul-lastpost"><span class="ulabel">'.$avatar.'</span></div>', $forum_page['item_body']['info']['lastpost']);
	
	$forum_page['item_body']['info']['lastpost'] =  str_replace('<cite>'.sprintf($lang_forum['by poster'], forum_htmlencode($cur_topic['last_poster'])).'</cite>', '<cite><a href="'.forum_link($forum_url['user'], $cur_topic['poster_id']).'">'.sprintf($lang_forum['by poster'], forum_htmlencode($cur_topic['last_poster'])).'</a></cite>', $forum_page['item_body']['info']['lastpost']);
}
