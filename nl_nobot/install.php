<?php
if (!defined('FORUM')) die();
global $forum_config;

if (!array_key_exists('o_nl_nobot_register_honeypot',  $forum_config)) forum_config_add('o_nl_nobot_register_honeypot',  '1');
if (!array_key_exists('o_nl_nobot_honeypot_name',      $forum_config)) forum_config_add('o_nl_nobot_honeypot_name',      'youname');

if (!array_key_exists('o_nl_nobot_register_recaptcha', $forum_config)) forum_config_add('o_nl_nobot_register_recaptcha', '0');
if (!array_key_exists('o_nl_nobot_recaptcha_pubkey',   $forum_config)) forum_config_add('o_nl_nobot_recaptcha_pubkey',   '');
if (!array_key_exists('o_nl_nobot_recaptcha_privkey',  $forum_config)) forum_config_add('o_nl_nobot_recaptcha_privkey',  '');

if (!array_key_exists('o_nl_nobot_register_yacaptcha', $forum_config)) forum_config_add('o_nl_nobot_register_yacaptcha', '1');
if (!array_key_exists('o_nl_nobot_yacaptcha_pubkey',   $forum_config)) forum_config_add('o_nl_nobot_yacaptcha_pubkey',   '');
if (!array_key_exists('o_nl_nobot_yacaptcha_privkey',  $forum_config)) forum_config_add('o_nl_nobot_yacaptcha_privkey',  '');

if (!array_key_exists('o_nl_nobot_cleantalk',      $forum_config)) forum_config_add('o_nl_nobot_cleantalk',  '');
if (!array_key_exists('o_nl_nobot_cleantalk_key',      $forum_config)) forum_config_add('o_nl_nobot_cleantalk_key',  '');
