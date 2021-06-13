<?php
if (!defined('FORUM')) die();
global $forum_config;

if (!array_key_exists('o_nl_include_php_head_end',    $forum_config)) forum_config_add('o_nl_include_php_head_end',    '');
if (!array_key_exists('o_nl_include_php_body_begin',  $forum_config)) forum_config_add('o_nl_include_php_body_begin',  '');
if (!array_key_exists('o_nl_include_php_body_end',    $forum_config)) forum_config_add('o_nl_include_php_body_end',    '');
if (!array_key_exists('o_nl_include_php_after_about', $forum_config)) forum_config_add('o_nl_include_php_after_about', '');
