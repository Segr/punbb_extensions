<?php
if (!defined('FORUM')) die();

$out_disablefields = ob_get_contents(); 
ob_end_clean();
if (isset($forum_config['o_nl_disablefields_jabber']) && $forum_config['o_nl_disablefields_jabber']=='1') {
	echo $out_disablefields;
}

ob_start();