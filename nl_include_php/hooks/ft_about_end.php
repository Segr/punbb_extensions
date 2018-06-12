<?php
if (!defined('FORUM')) die();

if (!empty($forum_config['o_nl_include_php_after_about'])) {
	ob_start();
		eval($forum_config['o_nl_include_php_after_about']);
		$ob_get_contents = ob_get_contents();
	ob_end_clean();
	echo $ob_get_contents;
}