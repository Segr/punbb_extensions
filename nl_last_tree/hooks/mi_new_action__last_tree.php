<?php
if (!defined('FORUM')) die();

$tpl_out = '';

if (!$forum_user['is_guest'])
	$tracked_topics = get_tracked_topics();

// 
$query = array(
	'SELECT'	=> 'f.id, f.forum_name',
	'FROM'		=> 'forums AS f',
	'JOINS'		=> array(
		array(
			'LEFT JOIN'		=> 'forum_perms AS fp',
			'ON'			=> '(fp.forum_id=f.id AND fp.group_id='.$forum_user['g_id'].')'
		)
	),
	'WHERE'		=> '(f.redirect_url IS NULL OR f.redirect_url="") AND (fp.read_forum IS NULL OR fp.read_forum=1)'
);
($hook = get_hook('nl_last_tree_get_forum_info')) ? eval($hook) : null;
$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
$canreadforums = array();
while ($row = $forum_db->fetch_assoc($result)) {
	$canreadforums[$row['id']] = $row;
}

//
$query = array(
	'SELECT'	=> 'COUNT(t.id)',
	'FROM'		=> 'topics AS t',
	'WHERE' 	=> 't.forum_id IN ('.implode(',', array_keys($canreadforums)).')',
	'ORDER BY' 	=> 't.last_post DESC'
);
$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);
$num_topics = $forum_db->result($result);

// Determine the topic offset (based on $_GET['p'])
$forum_page['num_pages'] = ceil($num_topics / $forum_user['disp_topics']);
$forum_page['page'] = (!isset($_GET['p']) || !is_numeric($_GET['p']) || $_GET['p'] <= 1 || $_GET['p'] > $forum_page['num_pages']) ? 1 : $_GET['p'];
$forum_page['start_from'] = $forum_user['disp_topics'] * ($forum_page['page'] - 1);
$forum_page['finish_at'] = min(($forum_page['start_from'] + $forum_user['disp_topics']), ($num_topics));
$forum_page['items_info'] = generate_items_info($lang_nl_last_tree['Message tree page'], ($forum_page['start_from'] + 1), $num_topics);

($hook = get_hook('nl_last_tree_modify_page_details')) ? eval($hook) : null;

// Navigation links for header and page numbering for title/meta description
if ($forum_page['page'] < $forum_page['num_pages'])
{
	$forum_page['nav']['last'] = '<link rel="last" href="'.forum_sublink($forum_url['last_tree'], $forum_url['page'], $forum_page['num_pages']).'" title="'.$lang_common['Page'].' '.$forum_page['num_pages'].'" />';
	$forum_page['nav']['next'] = '<link rel="next" href="'.forum_sublink($forum_url['last_tree'], $forum_url['page'], ($forum_page['page'] + 1)).'" title="'.$lang_common['Page'].' '.($forum_page['page'] + 1).'" />';
}
if ($forum_page['page'] > 1)
{
	$forum_page['nav']['prev'] = '<link rel="prev" href="'.forum_sublink($forum_url['last_tree'], $forum_url['page'], ($forum_page['page'] - 1)).'" title="'.$lang_common['Page'].' '.($forum_page['page'] - 1).'" />';
	$forum_page['nav']['first'] = '<link rel="first" href="'.forum_link($forum_url['last_tree']).'" title="'.$lang_common['Page'].' 1" />';
}	

$query = array(
	'SELECT'	=> 't.id, t.subject, t.forum_id, f.forum_name, c.cat_name, t.first_post_id, t.last_post, p.poster_id, p.posted, u.username as poster_username, u.realname as poster_realname',
	'FROM'		=> 'topics AS t',
	'JOINS'		=> array(
		array(
			'INNER JOIN'	=> 'forums AS f',
			'ON'			=> 'f.id=t.forum_id'
		),
		array(
			'INNER JOIN'	=> 'categories AS c',
			'ON'			=> 'c.id=f.cat_id'
		),
		array(
			'INNER JOIN'	=> 'posts AS p',
			'ON'			=> 'p.id=t.first_post_id'
		),
		array(
			'INNER JOIN'	=> 'users AS u',
			'ON'			=> 'u.id=p.poster_id'
		),
	),
	'WHERE' 	=> 't.forum_id IN ('.implode(',', array_keys($canreadforums)).')',
	'ORDER BY' 	=> 't.last_post DESC',
	'LIMIT'		=> $forum_page['start_from'].', '.$forum_user['disp_topics'],
);

($hook = get_hook('nl_last_tree_get_topics_id')) ? eval($hook) : null;
$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

$topics = $topics = array();
while ($row = $forum_db->fetch_assoc($result)) {
	$topics[$row['id']] = $row;
}	

foreach ($topics as $topic_id=>$topic) {
	$last_post = time(); //$cur_set['last_post']
	$isnew_topic = 
		!$forum_user['is_guest']
		&& $topic['last_post'] > $forum_user['last_visit']
		&& (!isset($tracked_topics['topics'][$topic['id']]) || $tracked_topics['topics'][$topic['id']] < $last_post)
		&& (!isset($tracked_topics['forums'][$topic['forum_id']]) || $tracked_topics['forums'][$topic['forum_id']] < $last_post);
	$tpl_line = 
		'<a class="forum" href="'.forum_link($forum_url['forum'], array($topic['forum_id'], sef_friendly($topic['forum_name']))).'">'.implode(' :: ', array($topic['cat_name'], $topic['forum_name'])).'</a>'.
		'<a class="topic" href="'.forum_link($forum_url['topic'], array($topic['id'], sef_friendly($topic['subject']))).'">'.$topic['subject'].'</a>'.
		'<a class="name"  href="'.forum_link($forum_url['user'], $topic['poster_id']).'">'.($topic['poster_realname']?$topic['poster_realname']:$topic['poster_username']).'</a>'.
		'<span class="date">['.format_time($topic['posted']).']</span>';
	$query = array(
		'SELECT'	=> 'p.id, p.posted, u.username as poster_username, u.realname as poster_realname',
		'FROM'		=> 'posts AS p',
		'JOINS'		=> array(
			array(
				'INNER JOIN'	=> 'users AS u',
				'ON'			=> 'u.id=p.poster_id'
			),
		),
		'WHERE' 	=> 'p.topic_id = '.$topic['id'].' AND p.id != '.$topic['first_post_id'].'',
		'ORDER BY' 	=> 'p.posted DESC',
		'LIMIT'		=> 6,
	);
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

	$posts = array();
	while ($row = $forum_db->fetch_assoc($result)) {
		$posts[$row['id']] = $row;
	}
	ksort($posts);
	if (count($posts)>1) {
		$tpl_posts = array();
		foreach ($posts as $post_id=>$post) {
			$tpl_posts[] = 
				'<li'.($post['posted']>$forum_user['last_visit']?' class="new"':'').'>'.
				'<a href="'.forum_link($forum_url['post'], array($post['id'], sef_friendly($post['poster_username']))).'">'.
				'<span class="name">'.($post['poster_realname']?$post['poster_realname']:$post['poster_username']).'</span>'.
				'<span class="date">['.format_time($post['posted']).']</span>'.
				'</a>'.
				'</li>';
		}
		$tpl_line .= '<ul class="latest">'.implode('', $tpl_posts).'</ul>';	
	}
		
	$tpl_topics[] = '<li'.($isnew_topic?' class="new"':'').'>'.$tpl_line.'</li>';	
}
$tpl_out .= '<ul class="tree">'.implode('', $tpl_topics).'</div>';

$tpl_out = '
	<div class="main-head">
		<h2 class="hn"><span>'.$forum_page['items_info'].'</span></h2>
	</div>
	<div class="main-content main-message">
	'.$tpl_out.'
	</div>
	<div class="main-foot">
		<h2 class="hn"><span>'.$forum_page['items_info'].'</span></h2>
	</div>
	';

$forum_page['crumbs'] = array(
	array($forum_config['o_board_title'], forum_link($forum_url['index'])),
	// array($lang_nl_last_tree['Message tree page'], forum_link($forum_url['last_tree_view'])),
	$lang_nl_last_tree['Message tree page'],
); 

if (file_exists($ext_info['path'] . '/css/' . $forum_user['style'] . '/' . $ext_info['id'] . '.css'))
	$forum_loader->add_css($ext_info['url'] . '/css/' . $forum_user['style'] . '/' . $ext_info['id'] . '.css');
else
	$forum_loader->add_css($ext_info['url'] . '/css/Oxygen/' . $ext_info['id'] . '.css');

$forum_page['page_post']['paging'] = '<p class="paging"><span class="pages">'.$lang_common['Pages'].'</span> '.paginate($forum_page['num_pages'], $forum_page['page'], $forum_url['last_tree'], $lang_common['Paging separator']).'</p>';
if ($forum_page['num_pages'] > 1)
	$forum_page['main_head_pages'] = sprintf($lang_common['Page info'], $forum_page['page'], $forum_page['num_pages']);

define('FORUM_PAGE', 'last_tree');
require FORUM_ROOT.'header.php';
$tpl_main = str_replace('<!-- forum_main -->', $tpl_out, $tpl_main);
require FORUM_ROOT.'footer.php';
