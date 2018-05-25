<?php
if (!defined('FORUM')) die();

$new_visit_links = array();
foreach ($visit_links as $k=>$v) {
	if ($k==='recent') {
		$new_visit_links['last_tree'] = '<span id="last_tree"><a id="last_tree_link" href="'.forum_link($forum_url['last_tree']).'">'.$lang_nl_last_tree['Message tree link'].'</a></span>';
	}
	$new_visit_links[$k] = $v;
}
$visit_links = $new_visit_links;
