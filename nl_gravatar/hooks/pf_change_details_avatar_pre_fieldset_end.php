<?php
if (!defined('FORUM')) die();
?>

</fieldset>

<div class="ct-box info-box">
	<p><?php echo $lang_nl_gravatar['Use Your Gravatar']; ?></p>
	<p><?php echo $lang_nl_gravatar['Uploading Avatar']; ?></p>
</div>

<?php ($hook = get_hook('pf_change_details_nl_gravatar_pre_fieldset')) ? eval($hook) : null; ?>

<fieldset class="frm-group group<?php echo ++$forum_page['group_count'] ?>">
	<legend class="group-legend"><strong><?php echo $lang_nl_gravatar['Gravatar'] ?></strong></legend>

<?php ($hook = get_hook('pf_change_details_nl_gravatar_pre_cur_gravatar_info')) ? eval($hook) : null; ?>

	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box checkbox">
			<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page['fld_count'] ?>" name="nl_gravatar" value="1" <?php if ($user['nl_gravatar'] == 1) echo 'checked="checked" ' ?>/></span>
			<label for="fld<?php echo $forum_page['fld_count'] ?>"><span><?php echo $lang_nl_gravatar['Use Gravatar'] ?></span> <?php echo $lang_nl_gravatar['Link To Your Universal Gravatar']; ?></label>
		</div>
	</div>

<?php ($hook = get_hook('pf_change_details_nl_gravatar_fieldset_end')) ? eval($hook) : null; ?>
