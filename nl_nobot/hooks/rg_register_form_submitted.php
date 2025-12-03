<?php
if (!defined('FORUM')) die();

$__local_errors = array();

if ($forum_config['o_nl_nobot_register_honeypot'] == '1' && !empty($forum_config['o_nl_nobot_honeypot_name'])) {
	if (!empty($_POST[$forum_config['o_nl_nobot_honeypot_name']])) {
		$__local_errors[] = $errors[] = $lang_nl_nobot['HoneyPot Error'];
	}
}

if ($forum_config['o_nl_nobot_register_recaptcha'] == '1' && !empty($forum_config['o_nl_nobot_recaptcha_privkey'])) {
	if (empty($_POST['g-recaptcha-response'])) {
		$__local_errors[] = $errors[] = $lang_nl_nobot['reCAPTCHA Error'];
	} else {
		include $ext_info['path'].'/lib/recaptcha/autoload.php';
		$reCaptcha_class = new \ReCaptcha\ReCaptcha($forum_config['o_nl_nobot_recaptcha_privkey']);
		$reCaptcha_verify = $reCaptcha_class->verify($_POST['g-recaptcha-response'], defined('__REMOTE_ADDR__') ? __REMOTE_ADDR__ : $_SERVER['REMOTE_ADDR']);
		if (!$reCaptcha_verify->isSuccess()) {
			$errorcodes = $reCaptcha_verify->getErrorCodes();
			if (is_array($errorcodes) && in_array('missing-input-response', $errorcodes)) {
				$__local_errors[] = $errors[] = $lang_nl_nobot['reCAPTCHA Error'];
			}
		}
	}
}

if ($forum_config['o_nl_nobot_register_yacaptcha'] == '1' && !empty($forum_config['o_nl_nobot_yacaptcha_privkey'])) {
	if (empty($_POST['smart-token'])) {
		$__local_errors[] = $errors[] = $lang_nl_nobot['yaCAPTCHA Error'];
	} else {
		$__curl = curl_init();
		$__args = http_build_query(array(
			"secret" => $forum_config['o_nl_nobot_yacaptcha_privkey'],
			"token"  => $_POST['smart-token'],
			"ip"     => defined('__REMOTE_ADDR__') ? __REMOTE_ADDR__ : $_SERVER['REMOTE_ADDR'],
		));
		curl_setopt($__curl, CURLOPT_URL, "https://smartcaptcha.yandexcloud.net/validate?{$__args}");
		curl_setopt($__curl, CURLOPT_RETURNTRANSFER, true);
		curl_setopt($__curl, CURLOPT_TIMEOUT, 1);

		$__output = curl_exec($__curl);
		$__httpcode = curl_getinfo($__curl, CURLINFO_HTTP_CODE);
		curl_close($__curl);
		if ($__httpcode !== 200) {
			$__local_errors[] = $errors[] = $lang_nl_nobot['yaCAPTCHA Error'];
		} else {
			$__resp = json_decode($__output);
			if ($__resp->status !== "ok") {
				$__local_errors[] = $errors[] = $lang_nl_nobot['yaCAPTCHA Error'];
			}
		}
	}
}
if (count($__local_errors) == 0 && $forum_config['o_nl_nobot_cleantalk'] == '1' && !empty($forum_config['o_nl_nobot_cleantalk_key'])) {
	$__data = array(
		'method_name'     => 'check_message',
		'auth_key'        => $forum_config['o_nl_nobot_cleantalk_key'],
		'sender_ip'       => $_SERVER['REMOTE_ADDR'] ?? '',
		'sender_info'     => array(
			'REFERRER'    => $_SERVER['HTTP_REFERER']    ?? '',
			'USER_AGENT'  => $_SERVER['HTTP_USER_AGENT'] ?? '',
		),
	);
	
	if (!empty($_POST['req_email1'])) {
		$__data['sender_email'] = $_POST['req_email1'];
	}
	if (!empty($_POST['req_username'])) {
		$__data['sender_nickname'] = $_POST['req_username'];
	}
	$__result = array();
	$__curl = curl_init();
	if ($__curl !== false) {
		curl_setopt_array($__curl, array(
			CURLOPT_URL            => 'https://moderate.cleantalk.org/api2.0',
			CURLOPT_POSTFIELDS     => json_encode($__data),
			CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_POST           => 1,
			CURLOPT_HEADER         => 0,
			CURLOPT_HTTPHEADER     => array('Content-Type:application/json'),
			CURLOPT_RETURNTRANSFER => 1,
		));
		$__result = curl_exec($__curl);
		$__result = json_decode($__result, true);
		curl_close($__curl);
	}
	$__result['account_status'] = $__result['account_status'] ?? 1;
	$__result['allow']          = $__result['allow']          ?? 1;
	$__result['spam']           = $__result['spam']           ?? 0;
	$__result['blacklisted']    = $__result['blacklisted']    ?? 0;
	if ($__result['account_status'] && !$__result['allow'] && ($__result['spam'] || $__result['blacklisted'])) {
		$errors[] = $lang_nl_nobot['CleanTalk Error'];
	}
}