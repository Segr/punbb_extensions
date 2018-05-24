<?php
if (!defined('FORUM')) die();

$forum_page['group_count'] = $forum_page['item_count'] = 0;
?>
<div class="content-head" id="<?php echo $ext_info['id'].'_settings'; ?>">
	<h2 class="hn"><span><?php echo $lang_nl_include_php['title'] ?></span></h2>
</div>
<fieldset class="frm-group group<?php echo ++$forum_page['group_count'] ?>">
	<legend class="group-legend"><strong><?php echo $lang_nl_include_php['title'] ?></strong></legend>
	<div class="txt-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="txt-box textarea">
			<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_nl_include_php['before_content'] ?></span></label>
			<div class="txt-input"><span class="fld-input"><textarea id="fld<?php echo $forum_page['fld_count'] ?>" name="form[nl_include_php_before_content]" rows="10" cols="55"><?php echo forum_htmlencode($forum_config['o_nl_include_php_before_content']) ?></textarea></span></div>
		</div>
	</div>
	<div class="txt-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="txt-box textarea">
			<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_nl_include_php['after_content'] ?></span></label>
			<div class="txt-input"><span class="fld-input"><textarea id="fld<?php echo $forum_page['fld_count'] ?>" name="form[nl_include_php_after_content]" rows="10" cols="55"><?php echo forum_htmlencode($forum_config['o_nl_include_php_after_content']) ?></textarea></span></div>
		</div>
	</div>
	<div class="txt-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="txt-box textarea">
			<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_nl_include_php['after_about'] ?></span></label>
			<div class="txt-input"><span class="fld-input"><textarea id="fld<?php echo $forum_page['fld_count'] ?>" name="form[nl_include_php_after_about]" rows="10" cols="55"><?php echo forum_htmlencode($forum_config['o_nl_include_php_after_about']) ?></textarea></span></div>
		</div>
	</div>
</fieldset>
<?
