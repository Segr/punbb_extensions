<?php
if (!defined('FORUM')) die();

$out_disablefields = ob_get_contents(); 
ob_end_clean();
if (isset($forum_config['o_nl_disablefields_twitter']) && $forum_config['o_nl_disablefields_twitter']=='1') {
	echo $out_disablefields;
}

ob_start();
