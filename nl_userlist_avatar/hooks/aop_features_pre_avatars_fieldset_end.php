<?php
if (!defined('FORUM')) die();
?>
</fieldset>
<a id="<?php echo $ext_info['id'].'_settings'; ?>" name="<?php echo $ext_info['id'].'_settings'; ?>"></a>
<fieldset class="frm-group group<?php echo ++$forum_page['group_count'] ?>">
	<legend class="group-legend"><span><?php echo $lang_admin_settings['Features Avatars legend'] ?></span></legend>
	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box checkbox">
		<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page['fld_count'] ?>" name="form[nl_userlist_avatar]" value="1"<?php if ($forum_config['o_nl_userlist_avatar'] == '1') echo ' checked="checked"' ?> /></span>
		<label for="fld<?php echo $forum_page['fld_count'] ?>"><span><?php echo $lang_nl_userlist_avatar['Userlist Avatar'] ?></span> <?php echo $lang_nl_userlist_avatar['Why Userlist Avatar'] ?></label>
		</div>
	</div>
	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box text">
		<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_nl_userlist_avatar['Default Userlist Avatar Size'] ?></span><small><?php echo $lang_nl_userlist_avatar['Why Default Userlist Avatar Size'] ?></small></label><br />
		<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" name="form[nl_userlist_avatar_size]" size="6" maxlength="6" value="<?php echo forum_htmlencode($forum_config['o_nl_userlist_avatar_size']) ?>" /></span>
		</div>
	</div>
