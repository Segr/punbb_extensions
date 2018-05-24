<?php
if (!defined('FORUM')) die();

ob_start();
	if (!empty($forum_config['o_nl_include_php_before_content'])) {
		eval($forum_config['o_nl_include_php_before_content']);
	}
	$tpl_main = preg_replace('~(<body[^>]*>)~i', "\\1".ob_get_contents(), $tpl_main);
ob_end_clean();
ob_start();
	if (!empty($forum_config['o_nl_include_php_after_content'])) {
		eval($forum_config['o_nl_include_php_after_content']);
	}
	$tpl_main = str_replace('</body>', ob_get_contents().'</body>', $tpl_main);
ob_end_clean();
