<?php
if (!defined('FORUM')) die();

$out_disablefields = ob_get_contents(); 
ob_end_clean();
$out_disablefields = preg_replace('~</?fieldset[^>]*>~i', '', $out_disablefields);
if (isset($forum_config['o_nl_disablefields_linkedin']) && $forum_config['o_nl_disablefields_linkedin']=='1') {
	echo $out_disablefields;
}

ob_start();
