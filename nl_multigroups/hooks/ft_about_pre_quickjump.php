<?
if (!defined('FORUM')) die();

// disable include quickjump cache 
@unlink(FORUM_CACHE_DIR.'cache_quickjump_'.$forum_user['g_id'].'.php');
define('FORUM_QJ_LOADED', 1);


$forum_id = isset($forum_id) ? $forum_id : 0;

$output = '<form id="qjump" method="get" accept-charset="utf-8" action="'.$base_url.'/viewforum.php">'."\n\t".'<div class="frm-fld frm-select">'."\n\t\t".'<label for="qjump-select"><span>'.$lang_common['Jump to'].'</span></label><br />'."\n\t\t".'<span class="frm-input"><select id="qjump-select" name="id">'."\n";

$query = array(
	'SELECT'	=> 'c.id AS cid, c.cat_name, f.id AS fid, f.forum_name, f.redirect_url',
	'FROM'		=> 'categories AS c',
	'JOINS'		=> array(
		array(
			'INNER JOIN'	=> 'forums AS f',
			'ON'			=> 'c.id=f.cat_id'
		),
		array(
			'LEFT JOIN'		=> 'forum_perms AS fp',
			'ON'			=> '(fp.forum_id=f.id AND fp.group_id='.$forum_user['g_id'].')'
		)
	),
	'WHERE'		=> 'fp.read_forum IS NULL OR fp.read_forum=1',
	'ORDER BY'	=> 'c.disp_position, c.id, f.disp_position',
);

$query = multigroups_updatequery_forumpermission($query, $forum_user['g_multi']);

($hook = get_hook('ch_fn_generate_quickjump_cache_qr_get_cats_and_forums')) ? eval($hook) : null;
$result = $forum_db->query_build($query) or error(__FILE__, __LINE__);

$forums = array();
while ($cur_forum = $forum_db->fetch_assoc($result))
{
	$forums[] = $cur_forum;
}

$cur_category = 0;
$forum_count = 0;
$sef_friendly_names = array();
foreach ($forums as $cur_forum)
{
	($hook = get_hook('ch_fn_generate_quickjump_cache_forum_loop_start')) ? eval($hook) : null;

	if ($cur_forum['cid'] != $cur_category)
	{
		if ($cur_category)
			$output .= "\t\t\t".'</optgroup>'."\n";

		$output .= "\t\t\t".'<optgroup label="'.forum_htmlencode($cur_forum['cat_name']).'">'."\n";
		$cur_category = $cur_forum['cid'];
	}

	$sef_friendly_names[$cur_forum['fid']] = sef_friendly($cur_forum['forum_name']);
	$redirect_tag = ($cur_forum['redirect_url'] != '') ? ' &gt;&gt;&gt;' : '';
	$output .= "\t\t\t\t".'<option value="'.$cur_forum['fid'].'"'.($forum_id == $cur_forum['fid'] ? ' selected="selected"' : '').'>'.forum_htmlencode($cur_forum['forum_name']).$redirect_tag.'</option>'."\n";
	$forum_count++;
	
	($hook = get_hook('ch_fn_generate_quickjump_cache_forum_loop_end')) ? eval($hook) : null;
}

$output .= "\t\t\t".'</optgroup>'."\n\t\t".'</select>'."\n\t\t".'<input type="submit" id="qjump-submit" value="'.$lang_common['Go'].'" /></span>'."\n\t".'</div>'."\n".'</form>'."\n";
$output_js = "\n".'(function () {'."\n\t".'var forum_quickjump_url = "'.forum_link($forum_url['forum']).'";'."\n\t".'var sef_friendly_url_array = new Array('.count($forums).');';

foreach ($sef_friendly_names as $forum_id => $forum_name)
	$output_js .= "\n\t".'sef_friendly_url_array['.$forum_id.'] = "'.forum_htmlencode($forum_name).'";';

// Add Load Event
$output_js .= "\n\n\t".'PUNBB.common.addDOMReadyEvent(function () { PUNBB.common.attachQuickjumpRedirect(forum_quickjump_url, sef_friendly_url_array); });'."\n".'}());';

echo $output;
if ($forum_count > 1) {
	$forum_loader->add_js($output_js, array('type' => 'inline', 'weight' => 60, 'group' => FORUM_JS_GROUP_SYSTEM));
}
