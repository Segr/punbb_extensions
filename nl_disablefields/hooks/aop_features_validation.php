<?php
if (!defined('FORUM')) die();

foreach(array_keys($nl_disablefields_options) as $k) {
	$form[$k] = isset($form[$k]) ? '1' : '0';
}