<?php
if (!defined('FORUM')) die();

global $lang_nl_last_tree;

if (empty($lang_nl_last_tree)) {
	if (file_exists($ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php'))
		include $ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php';
	else
		include $ext_info['path'].'/lang/English/'.$ext_info['id'].'.php';
}

$new_visit_links = array();

$pos = 0;
foreach ($visit_links as $k => $v) {
	if ($k === 'recent') {
		$new_visit_links['last_tree'] =	'<span id="last_tree"' . (empty($pos) ? ' class="first-item"' : '') . '><a id="last_tree_link" href="' . forum_link($forum_url['last_tree']) . '">' . $lang_nl_last_tree['Message tree link'] . '</a></span>';
		$pos++;
	}
	if (!empty($pos)) {
		$v = str_replace(' class="first-item"', '', $v);
	}
	$new_visit_links[$k] = $v;
	$pos++;
}

$visit_links = $new_visit_links;
