<?php
if (!defined('FORUM')) die();

if (!empty($forum_config['o_nl_include_php_head_end'])) {
	ob_start();
		eval($forum_config['o_nl_include_php_head_end']);
		$ob_get_contents = ob_get_contents();
	ob_end_clean();
	if (!empty($ob_get_contents)) {
		$tpl_main = str_replace('</head>', "\n{$ob_get_contents}\n</head>", $tpl_main);
	}
}
if (!empty($forum_config['o_nl_include_php_body_begin'])) {
	ob_start();
		eval($forum_config['o_nl_include_php_body_begin']);
		$ob_get_contents = ob_get_contents();
	ob_end_clean();
	if (!empty($ob_get_contents)) {
		$tpl_main = preg_replace('~(<body[^>]*>)~i', "\\1\n{$ob_get_contents}\n", $tpl_main);
	}
}
if (!empty($forum_config['o_nl_include_php_body_end'])) {
	ob_start();
		eval($forum_config['o_nl_include_php_body_end']);
		$ob_get_contents = ob_get_contents();
	ob_end_clean();
	if (!empty($ob_get_contents)) {
		$tpl_main = str_replace('</body>', "\n{$ob_get_contents}\n</body>", $tpl_main);
	}
}