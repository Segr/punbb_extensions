<?php
if (!defined('FORUM')) die();

$__send_mail = null;
$__send_mail_body = '';

if ($forum_config['o_nl_nobot_register_honeypot'] == '1' && !empty($forum_config['o_nl_nobot_honeypot_name'])) {
	if (!empty($_POST[$forum_config['o_nl_nobot_honeypot_name']])) {
		$errors[] = $lang_nl_nobot['HoneyPot Error'];
		$__send_mail = false;
		$__send_mail_body .= "honeypot: ".$_POST[$forum_config['o_nl_nobot_honeypot_name']]."\n";
	} else {
		$__send_mail = ($__send_mail===null ? true : $__send_mail) && true;
		$__send_mail_body .= "honeypot: ---\n";
	}
}

if ($forum_config['o_nl_nobot_register_recaptcha'] == '1' && !empty($forum_config['o_nl_nobot_recaptcha_privkey'])) {
	if (empty($_POST['g-recaptcha-response'])) {
		$errors[] = $lang_nl_nobot['reCAPTCHA Error'];
		$__send_mail = false;
		$__send_mail_body .= "recaptcha-response: empty\n";
	} else {
		include $ext_info['path'].'/lib/recaptcha/autoload.php';
		$reCaptcha_class = new \ReCaptcha\ReCaptcha($forum_config['o_nl_nobot_recaptcha_privkey']);
		$reCaptcha_verify = $reCaptcha_class->verify($_POST['g-recaptcha-response'], defined('__REMOTE_ADDR__') ? __REMOTE_ADDR__ : $_SERVER['REMOTE_ADDR']);
		if (!$reCaptcha_verify->isSuccess()) {
			$errorcodes = $reCaptcha_verify->getErrorCodes();
			if (is_array($errorcodes) && in_array('missing-input-response', $errorcodes)) {
				$errors[] = $lang_nl_nobot['reCAPTCHA Error'];
				$__send_mail = false;
				$__send_mail_body .= "\$reCaptcha_verify: ".var_export($reCaptcha_verify, true)."\n";
			} else {
				$__send_mail = false;
				$__send_mail_body .= "\$reCaptcha_verify: ".var_export($reCaptcha_verify, true)."\n";
			}
		} else {
			$__send_mail = ($__send_mail===null ? true : $__send_mail) && true;
			$__send_mail_body .= "\$reCaptcha_verify: ".var_export($reCaptcha_verify, true)."\n";
		}
	}
}

if (false && $__send_mail!==null) {
	if (!defined('FORUM_EMAIL_FUNCTIONS_LOADED')) require FORUM_ROOT.'include/email.php';
	forum_mail(
		'kaparov@csoft.ru',
		($__send_mail ? 'good' : 'error') . ' in noBot',
		"IP: ".(defined('__REMOTE_ADDR__') ? __REMOTE_ADDR__ : $_SERVER['REMOTE_ADDR'])."\n".
		"POST:\n".implode("\n", array_map(function($key, $val){ return "\t{$key} => ".preg_replace('~[\n\r\s\t]+~', ' ', var_export($val , true)); }, array_keys($_POST), array_values($_POST)))."\n".
		"\n".
		$__send_mail_body
	);
}