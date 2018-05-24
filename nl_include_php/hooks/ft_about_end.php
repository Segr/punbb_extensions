<?php
if (!defined('FORUM')) die();

ob_start();
	if (!empty($forum_config['o_nl_include_php_after_about'])) {
		eval($forum_config['o_nl_include_php_after_about']);
	}
	$nl_include_php_after_about = ob_get_contents();
ob_end_clean();
echo $nl_include_php_after_about;
