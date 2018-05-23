<?php
if (!defined('FORUM')) die();

$gr_site = 'http://www.gravatar.com';

$gr_email = strtolower(trim($cur_post['poster_email']));
if ($cur_post['poster_id']==1 && $forum_config['o_nl_gravatar_guests']=='1' && !empty($gr_email)){
	$gr_width  = $forum_config['o_nl_gravatar_width'];
	if ($forum_config['o_nl_gravatar_default']=='defaultimage') {
		$default_image = $forum_config['o_nl_gravatar_default_image'];
		if (!preg_match('~^https?://~i', $default_image)) {
			if (strpos($default_image, $base_url)!==0) {
				$default_image = ltrim($default_image, '/');
				$default_image = $base_url.'/'.$default_image;
			}
		}
		$gr_default = 'd='.urlencode($default_image).'&amp;';
	} else {
		$gr_default = 'd='.$forum_config['o_nl_gravatar_default'].'&amp;';
	}
	if ($forum_config['o_nl_gravatar_rating']!='all') $gr_default .= 'r='.$forum_config['o_nl_gravatar_rating'].'&amp;';
	$gr_url = $gr_site.'/avatar/'.md5($gr_email).'?'.$gr_default.'size='.$gr_width; 
	if ($forum_config['o_nl_gravatar_default']=='404') {
		$gr_php = $gr_site.'/'.md5($gr_email).'.php'; 
		$gr_content = @file_get_contents($gr_php);
		$gr_content = unserialize($gr_content);
		if (!is_array($gr_content) || !isset($gr_content['entry'])) {
			$gr_url = '';
		}
	}
	if (!empty($gr_url)) {
		$avatar_markup = '<img src="'.$gr_url.'" width="'.$gr_width.'" height="'.$gr_width.'" alt=" " />';
		$gravatar_splice = array('avatar'=>'<li class="useravatar">'.$gravatar_markup.'</li>');
		unset($forum_page['author_ident']['avatar']);
		array_splice($forum_page['author_ident'], 1, 0, $gravatar_splice);
	}
}
