<?php
if (!defined('FORUM')) die();

// lang
global $lang_nl_last_tree;
if (!isset($lang_nl_last_tree)) {
	if (file_exists($ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php'))
		include $ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php';
	else
		include $ext_info['path'].'/lang/English/'.$ext_info['id'].'.php';
}

$new_visit_links = array();
foreach ($visit_links as $k=>$v) {
  if ($k==='recent') {
	$new_visit_links['last_tree'] = '<span id="last_tree"><a id="last_tree_link" href="'.forum_link($forum_url['last_tree']).'">'.$lang_nl_last_tree['Message tree link'].'</a></span>';
  }
  $new_visit_links[$k] = $v;
}
$visit_links = $new_visit_links;
