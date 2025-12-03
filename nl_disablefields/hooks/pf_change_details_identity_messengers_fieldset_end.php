<?php
if (!defined('FORUM')) die();

$out_disablefields = ob_get_contents(); 
ob_end_clean();


foreach ($nl_disablefields_options as $k=>$v) {
	if (isset($forum_config['o_'.$k]) && $forum_config['o_'.$k]=='1') {
		echo $out_disablefields;
		break;
	}
}