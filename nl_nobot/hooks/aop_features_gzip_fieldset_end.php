<?php
if (!defined('FORUM')) die();

$forum_page['group_count'] = $forum_page['item_count'] = 0;
?>

<div class="content-head" id="<?php echo $ext_info['id'].'_settings'; ?>">
	<h2 class="hn"><span><?php echo $lang_nl_nobot['noBot Options'] ?></span></h2>
</div>
<fieldset class="frm-group group<?php echo ++$forum_page['group_count'] ?>">
	<legend class="group-legend"><strong><?php echo $lang_nl_nobot['noBot Options'] ?></strong></legend>

	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box text">
			<input type="hidden" name="form[nl_nobot_recaptcha_pubkey]" value="" />
			<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_nl_nobot['Public key'] ?></span><small><?php echo $lang_nl_nobot['Public key label'] ?></small></label><br />
			<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" name="form[nl_nobot_recaptcha_pubkey]" size="50" value="<?php echo $forum_config['o_nl_nobot_recaptcha_pubkey'] ?>" /></span>
		</div>
	</div>

	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box text">
			<input type="hidden" name="form[nl_nobot_recaptcha_privkey]" value="" />
			<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_nl_nobot['Private key'] ?></span><small><?php echo $lang_nl_nobot['Private key label'] ?></small></label><br />
			<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" name="form[nl_nobot_recaptcha_privkey]" size="50" value="<?php echo $forum_config['o_nl_nobot_recaptcha_privkey'] ?>" /></span>
		</div>
	</div>

	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box text">
			<input type="hidden" name="form[nl_nobot_honeypot_name]" value="" />
			<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_nl_nobot['HoneyPot Name'] ?></span><small><?php echo $lang_nl_nobot['HoneyPot Name label'] ?></small></label><br />
			<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" name="form[nl_nobot_honeypot_name]" size="50" value="<?php echo $forum_config['o_nl_nobot_honeypot_name'] ?>" /></span>
		</div>
	</div>

	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box checkbox">
			<input type="hidden" name="form[nl_nobot_register_recaptcha]" value="0" />
			<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page['fld_count'] ?>" name="form[nl_nobot_register_recaptcha]" value="1"<?php if ($forum_config['o_nl_nobot_register_recaptcha'] == '1') echo ' checked="checked"' ?> /></span>
			<label for="fld<?php echo $forum_page['fld_count'] ?>"><span><?php echo $lang_nl_nobot['Register page reCAPTCHA field'] ?></span> <?php echo $lang_nl_nobot['Register page reCAPTCHA field label'] ?></label>
		</div>
	</div>

	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box checkbox">
			<input type="hidden" name="form[nl_nobot_register_honeypot]" value="0" />
			<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page['fld_count'] ?>" name="form[nl_nobot_register_honeypot]" value="1"<?php if ($forum_config['o_nl_nobot_register_honeypot'] == '1') echo ' checked="checked"' ?> /></span>
			<label for="fld<?php echo $forum_page['fld_count'] ?>"><span><?php echo $lang_nl_nobot['Register page HoneyPot field'] ?></span> <?php echo $lang_nl_nobot['Register page HoneyPot field label'] ?></label>
		</div>
	</div>


</fieldset>

<?