<?
if (!defined('FORUM')) die();

if ($group_id<5)  $group['multigroups_type']  = 1;
if ($mode=='add') $group['multigroups_type'] |= 3;

$forum_page['group_count'] = $forum_page['item_count'] = 0;
?>

<fieldset class="mf-set set<?php echo ++$forum_page['item_count'] ?>">
	<legend><span><?php echo $lang_nl_multigroups['g_admin_show'] ?></span></legend>
	<div class="mf-box">
		<div class="mf-item">
			<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page['fld_count'] ?>" name="multigroups_type1" value="1"<?php if ((int)$group['multigroups_type'] & 1) echo ' checked="checked"' ?> /></span>
			<label for="fld<?php echo $forum_page['fld_count'] ?>"><?php echo $lang_nl_multigroups['g_admin_show1'] ?></label>
		</div>
		<div class="mf-item">
			<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page['fld_count'] ?>" name="multigroups_type2" value="1"<?php if ((int)$group['multigroups_type'] & 2) echo ' checked="checked"' ?> /></span>
			<label for="fld<?php echo $forum_page['fld_count'] ?>"><?php echo $lang_nl_multigroups['g_admin_show2'] ?></label>
		</div>
	</div>
</fieldset>
