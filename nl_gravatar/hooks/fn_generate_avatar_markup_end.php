<?php
if (!defined('FORUM')) die();
global $forum_db;

$gr_site = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') ? 'https' : 'http').'://www.gravatar.com';

if ($avatar_markup=='' && $user_id) {
	$gr_query = array(
		'SELECT' => 'email, nl_gravatar',
		'FROM'   => 'users',
		'WHERE'  => 'id=\''.$user_id.'\'',
	);
	if (NL_GRAVATAR_USER_HAS_GENDER) {
		$gr_query['SELECT'] .= ', gender';
	}
	$gr_result = $forum_db->query_build($gr_query) or error(__FILE__, __LINE__);
	$gr_user = $forum_db->fetch_assoc($gr_result);
	$gr_email = strtolower(trim($gr_user['email']));
	if ($gr_user['nl_gravatar']==1 && !empty($gr_email)) {
		$gr_width  = $avatar_width  ? $avatar_width : $forum_config['o_nl_gravatar_width'];
		$gr_height = $avatar_height ? $avatar_height : $forum_config['o_nl_gravatar_width'];
		if ($forum_config['o_nl_gravatar_default']=='defaultimage') {
			if (isset($gr_user['gender']) && $gr_user['gender']=='female') {
				$default_image = $forum_config['o_nl_gravatar_default_image2'];
			} else {	
				$default_image = $forum_config['o_nl_gravatar_default_image'];
			}
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
		$gr_url = $gr_site.'/avatar/'.md5($gr_email).'?'.$gr_default.'size='.min($gr_width, $gr_height); 
		if ($forum_config['o_nl_gravatar_default']=='404') {
			$gr_php = $gr_site.'/'.md5($gr_email).'.php'; 
			$gr_content = @file_get_contents($gr_php);
			$gr_content = unserialize($gr_content);
			if (!is_array($gr_content) || !isset($gr_content['entry'])) {
				$gr_url = '';
			}
		}
		if (!empty($gr_url))
			$avatar_markup = '<img src="'.$gr_url.'" width="'.$gr_width.'" height="'.$gr_height.'" alt=" " />';
	}
}
