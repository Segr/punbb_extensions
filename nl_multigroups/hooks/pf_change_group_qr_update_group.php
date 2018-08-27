<?
if (!defined('FORUM')) die();

$form_groups = (isset($_POST['multi_in'])) ? array_keys($_POST['multi_in']) : array('0');
$form_groups = array_filter(array_map('intval', $form_groups));
$form_groups = count($form_groups)>0 ? implode(',', $form_groups) : '0';

$query['SET'] .= ', g_multi=\''.$forum_db->escape($form_groups).'\'';
