<?
if (!defined('FORUM')) die();

include $ext_info['path'].'/hooks/co_common.php';

?>
<fieldset class="mf-set set<?php echo ++$forum_page['item_count'] ?>">
	<legend><span><?php echo $lang_nl_multigroups['g_users'] ?></span></legend>

	<div class="mf-box">
		<div class="checklist">
<?php
	$g_multi = array_filter(array_map('intval', explode(',', $user['g_multi'])));
	$g_multi = count($g_multi)>0 ? $g_multi : array('0');

	$query = array(
		'SELECT'	=> 'g.g_id, g.g_title',
		'FROM'		=> 'groups AS g',
		'WHERE'		=> 'g.g_id!='.FORUM_GUEST,
		'ORDER BY'	=> 'g.g_title'
	);
	$query = multigroups_updatequery_list($query, 2);

	($hook = get_hook('nl_multigroups_db_get_list_groups')) ? eval($hook) : null;
	$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

	while ($cur_group = $forum_db->fetch_assoc($result)) 	{
		echo "\t\t\t\t\t\t\t".'<div class="checklist-item"><span class="fld-input"><input type="checkbox" id="fld'.(++$forum_page['fld_count']).'" name="multi_in['.$cur_group['g_id'].']" value="1"'.((in_array($cur_group['g_id'], $g_multi)) ? ' checked="checked"' : '').' /></span> <label for="fld'.$forum_page['fld_count'].'">'.forum_htmlencode($cur_group['g_title']).'</label></div>'."\n";
	}
?>
		</div>
	</div>
</fieldset>
