<?php
if (!defined('FORUM')) die();

if ($forum_config['o_nl_nobot_register_honeypot'] == '1' && !empty($forum_config['o_nl_nobot_honeypot_name']))
{
?>
	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?> hidden">
		<div class="sf-box text hidden">
			<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_nl_nobot['HoneyPot'] ?></span></label><br />
			<span class="fld-input hidden">
				<input id="fld<?php echo $forum_page['fld_count'] ?>" type="text" name="<?php echo $forum_config['o_nl_nobot_honeypot_name'] ?>" value="" /></span>
			</span>
		</div>
	</div>
<?php
}

if ($forum_config['o_nl_nobot_register_recaptcha'] == '1' && !empty($forum_config['o_nl_nobot_recaptcha_pubkey']))
{
?>
	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box text required">
			<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_nl_nobot['reCAPTCHA'] ?></span></label><br />
			<span class="fld-input" style="position:relative">
				<div class="g-recaptcha" data-sitekey="<?php echo $forum_config['o_nl_nobot_recaptcha_pubkey'] ?>"></div>
			</span>
		</div>
	</div>
<?php
}

if ($forum_config['o_nl_nobot_register_yacaptcha'] == '1' && !empty($forum_config['o_nl_nobot_yacaptcha_pubkey']))
{
?>
	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box text required">
			<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_nl_nobot['yaCAPTCHA'] ?></span></label><br />
			<span class="fld-input" style="position:relative">
				<div style="display: inline-block">
					<div style="height: 100px" id="captcha-container" class="smart-captcha" data-sitekey="<?php echo $forum_config['o_nl_nobot_yacaptcha_pubkey'] ?>"></div>
				</div>
			</span>
		</div>
	</div>
<?php
}

