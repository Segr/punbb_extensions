<?php 
if (!defined('FORUM')) die();

if ($cur_forum['last_post'] != '') {
	$avatar = pan_get_avatar($cur_forum['poster_id'], $cur_forum['avatar'], $cur_forum['avatar_width'], $cur_forum['avatar_height']);

	$forum_page['item_body']['info']['lastpost'] = '<li class="info-lastpost">'."\n".'<div class="ul-lastpost"><span class="ulabel">'.$avatar.'</span></div><strong style="padding:0;"><a href="'.forum_link($forum_url['post'], $cur_forum['last_post_id']).'">'.format_time($cur_forum['last_post']).'</a></strong> <cite>'.sprintf($lang_index['Last poster'], forum_htmlencode($cur_forum['last_poster'])).'</cite></li>';
} else {
	$forum_page['item_body']['info']['lastpost'] = '<li class="info-lastpost"><strong>'.$lang_common['Never'].'</strong></li>';
}
