<?php
if (!defined('FORUM')) die();

forum_config_remove(array(
	'o_nl_nobot_register_recaptcha',
	'o_nl_nobot_register_honeypot',
	'o_nl_nobot_recaptcha_pubkey',
	'o_nl_nobot_recaptcha_privkey',
	'o_nl_nobot_honeypot_name',
));
