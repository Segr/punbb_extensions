<?php
if (!defined('FORUM')) die();
?>

</fieldset>

<?php ($hook = get_hook('pf_change_details_nl_userlist_avatar_pre_fieldset')) ? eval($hook) : null; ?>

<fieldset class="frm-group group<?php echo ++$forum_page['group_count'] ?>">
	<legend class="group-legend"><strong><?php echo $lang_nl_userlist_avatar['Show avatars'] ?></strong></legend>

<?php ($hook = get_hook('pf_change_details_nl_userlist_avatar_pre_info')) ? eval($hook) : null; ?>

	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box checkbox">
			<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page['fld_count'] ?>" name="nl_userlist_avatar" value="1" <?php if ($user['nl_userlist_avatar'] == 1) echo 'checked="checked" ' ?>/></span>
			<label for="fld<?php echo $forum_page['fld_count'] ?>"><span><?php echo $lang_nl_userlist_avatar['Show avatars'] ?></span> <?php echo $lang_nl_userlist_avatar['Why Show avatars']; ?></label>
		</div>
	</div>

<?php ($hook = get_hook('pf_change_details_nl_userlist_avatar_fieldset_end')) ? eval($hook) : null; ?>
