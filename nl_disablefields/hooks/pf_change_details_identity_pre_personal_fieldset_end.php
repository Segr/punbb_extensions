<?php
if (!defined('FORUM')) die();

$disablefields_savehook = '';
foreach ($forum_hooks['pf_change_details_identity_personal_fieldset_end'] as $k=>$v) {
	if (strpos($v, "'nl_disablefields'")!==false) {
		$disablefields_savehook = $v;
		unset($forum_hooks['pf_change_details_identity_personal_fieldset_end'][$k]);
		break;
	}
}
if ($disablefields_savehook) {
	$forum_hooks['pf_change_details_identity_personal_fieldset_end'][] = $disablefields_savehook;
}
?>			
