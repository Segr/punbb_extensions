<?php
if (!defined('FORUM')) die();
$forum_page['group_count'] = $forum_page['item_count'] = 0;
?>
<div class="content-head"  id="<?php echo $ext_info['id'].'_settings'; ?>">
	<h2 class="hn"><span><?php echo $lang_nl_disablefields['Default Profile Fields'] ?></span></h2>
</div>
<fieldset class="frm-group group<?php echo ++$forum_page['group_count'] ?>">
	<legend class="group-legend"><span><?php echo $lang_nl_disablefields['Default Profile Fields'] ?></span></legend>
	<fieldset class="mf-set set<?php echo ++$forum_page['item_count'] ?>">
		<legend><span><?php echo $lang_nl_disablefields['Show Profile Fields'] ?></span></legend>
		<div class="mf-box">
			<div class="checklist">	
<?
foreach ($nl_disablefields_options as $k=>$v) {
	echo "\t\t\t\t\t\t\t\t"
		.'<div class="checklist-item">'
			.'<span class="fld-input">'
				.'<input type="checkbox" id="fld'.(++$forum_page['fld_count']).'"  name="form['.$k.']" value="1"'.(($forum_config['o_'.$k] == '1') ? ' checked="checked"' : '').' />'
			.'</span>'
			.'<label for="fld'.$forum_page['fld_count'].'">'.forum_htmlencode($v).'</label>'
		.'</div>'
		."\n";
}
?>
			</div>
		</div>
	</fieldset>
</fieldset>
