<?php
if (!defined('FORUM')) die();

if (FORUM_PAGE=='register') {
	if ($forum_config['o_nl_nobot_register_recaptcha'] == '1') {
		$forum_loader->add_js(
			'https://www.google.com/recaptcha/api.js?hl=ru&onload=recaptcha_onload',
			array(
				'type' 		=> 'url',
				'async' 	=> TRUE,
				'weight' 	=> 140
			)
		);
	}
	if ($forum_config['o_nl_nobot_register_yacaptcha'] == '1') {
		$forum_loader->add_js(
			'https://smartcaptcha.cloud.yandex.ru/captcha.js',
			array(
				'type' 		=> 'url',
				'async' 	=> TRUE,
				'weight' 	=> 140
			)
		);
	}
}