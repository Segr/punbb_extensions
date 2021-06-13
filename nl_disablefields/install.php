<?php
if (!defined('FORUM')) die();
global $forum_config;

if (!array_key_exists('o_nl_disablefields_url',      $forum_config)) forum_config_add('o_nl_disablefields_url',      '1');
if (!array_key_exists('o_nl_disablefields_facebook', $forum_config)) forum_config_add('o_nl_disablefields_facebook', '1');
if (!array_key_exists('o_nl_disablefields_twitter',  $forum_config)) forum_config_add('o_nl_disablefields_twitter',  '1');
if (!array_key_exists('o_nl_disablefields_linkedin', $forum_config)) forum_config_add('o_nl_disablefields_linkedin', '1');
if (!array_key_exists('o_nl_disablefields_jabber',   $forum_config)) forum_config_add('o_nl_disablefields_jabber',   '1');
if (!array_key_exists('o_nl_disablefields_skype',    $forum_config)) forum_config_add('o_nl_disablefields_skype',    '1');
if (!array_key_exists('o_nl_disablefields_msn',      $forum_config)) forum_config_add('o_nl_disablefields_msn',      '1');
if (!array_key_exists('o_nl_disablefields_icq',      $forum_config)) forum_config_add('o_nl_disablefields_icq',      '1');
if (!array_key_exists('o_nl_disablefields_aim',      $forum_config)) forum_config_add('o_nl_disablefields_aim',      '1');
if (!array_key_exists('o_nl_disablefields_yahoo',    $forum_config)) forum_config_add('o_nl_disablefields_yahoo',    '1');