<?php
if (!defined('FORUM')) die();

$section = isset($_GET['section']) ? $_GET['section'] : null;

if ($section=='nl_gravatar') {
	if (isset($_POST['form']['nl_gravatar']))
		$form['nl_gravatar']=1;
	else
		$form['nl_gravatar']=0;
}

