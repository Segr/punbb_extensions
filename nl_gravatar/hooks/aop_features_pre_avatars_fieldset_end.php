<?php
if (!defined('FORUM')) die();
?>
</fieldset>
<a id="<?php echo $ext_info['id'].'_settings'; ?>" name="<?php echo $ext_info['id'].'_settings'; ?>"></a>
<fieldset class="frm-group group<?php echo ++$forum_page['group_count'] ?>">
	<legend class="group-legend"><span><?php echo $lang_admin_settings['Features Avatars legend'] ?></span></legend>
	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box checkbox">
		<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page['fld_count'] ?>" name="form[nl_gravatar]" value="1"<?php if ($forum_config['o_nl_gravatar'] == '1') echo ' checked="checked"' ?> /></span>
		<label for="fld<?php echo $forum_page['fld_count'] ?>"><span><?php echo $lang_nl_gravatar['Allow Gravatars'] ?></span> <?php echo $lang_nl_gravatar['Allow Use'] ?></label>
		</div>
	</div>
	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box checkbox">
		<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page['fld_count'] ?>" name="form[nl_gravatar_guests]" value="1"<?php if ($forum_config['o_nl_gravatar_guests'] == '1') echo ' checked="checked"' ?> /></span>
		<label for="fld<?php echo $forum_page['fld_count'] ?>"><span><?php echo $lang_nl_gravatar['Guest Gravatars'] ?></span> <?php echo $lang_nl_gravatar['Allow Guests'] ?></label>
		</div>
	</div>
	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box text">
		<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_nl_gravatar['Default Gravatar Width'] ?></span><small><?php echo $lang_nl_gravatar['Gravatar Width'] ?></small></label><br />
		<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" name="form[nl_gravatar_width]" size="6" maxlength="6" value="<?php echo forum_htmlencode($forum_config['o_nl_gravatar_width']) ?>" /></span>
		</div>
	</div>
	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box select">
			<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_nl_gravatar['Gravatar Rating'] ?></span><small><?php echo $lang_nl_gravatar['Why Gravatar Rating'] ?></small></label><br />
			<span class="fld-input"><select id="fld<?php echo $forum_page['fld_count'] ?>" name="form[nl_gravatar_rating]">
				<option value="all"<?php if ($forum_config['o_nl_gravatar_rating'] == 'all') echo ' selected="selected"' ?>><?php echo $lang_nl_gravatar['Rating - Not Used']; ?></option>
				<option value="G"<?php if ($forum_config['o_nl_gravatar_rating'] == 'G') echo ' selected="selected"' ?>><?php echo $lang_nl_gravatar['Rating - G']; ?></option>
				<option value="PG"<?php if ($forum_config['o_nl_gravatar_rating'] == 'PG') echo ' selected="selected"' ?>><?php echo $lang_nl_gravatar['Rating - PG']; ?></option>
				<option value="R"<?php if ($forum_config['o_nl_gravatar_rating'] == 'R') echo ' selected="selected"' ?>><?php echo $lang_nl_gravatar['Rating - R']; ?></option>
				<option value="X"<?php if ($forum_config['o_nl_gravatar_rating'] == 'X') echo ' selected="selected"' ?>><?php echo $lang_nl_gravatar['Rating - X']; ?></option>
			</select></span>
		</div>
	</div>
	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box select">
			<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_nl_gravatar['Default Gravatar'] ?></span><small><?php echo $lang_nl_gravatar['Why Gravatar Default'] ?></small></label><br />
			<span class="fld-input"><select id="fld<?php echo $forum_page['fld_count'] ?>" name="form[nl_gravatar_default]">
				<option value="404"<?php if ($forum_config['o_nl_gravatar_default'] == '404') echo ' selected="selected"' ?>><?php echo $lang_nl_gravatar['Default - 404']; ?></option>
				<option value="mp"<?php if ($forum_config['o_nl_gravatar_default'] == 'mp') echo ' selected="selected"' ?>><?php echo $lang_nl_gravatar['Default - mp']; ?></option>
				<option value="identicon"<?php if ($forum_config['o_nl_gravatar_default'] == 'identicon') echo ' selected="selected"' ?>><?php echo $lang_nl_gravatar['Default - identicon']; ?></option>
				<option value="monsterid"<?php if ($forum_config['o_nl_gravatar_default'] == 'monsterid') echo ' selected="selected"' ?>><?php echo $lang_nl_gravatar['Default - monsterid']; ?></option>
				<option value="wavatar"<?php if ($forum_config['o_nl_gravatar_default'] == 'wavatar') echo ' selected="selected"' ?>><?php echo $lang_nl_gravatar['Default - wavatar']; ?></option>
				<option value="retro"<?php if ($forum_config['o_nl_gravatar_default'] == 'retro') echo ' selected="selected"' ?>><?php echo $lang_nl_gravatar['Default - retro']; ?></option>
				<option value="robohash"<?php if ($forum_config['o_nl_gravatar_default'] == 'robohash') echo ' selected="selected"' ?>><?php echo $lang_nl_gravatar['Default - robohash']; ?></option>
				<option value="blank"<?php if ($forum_config['o_nl_gravatar_default'] == 'blank') echo ' selected="selected"' ?>><?php echo $lang_nl_gravatar['Default - blank']; ?></option>
				<option value="defaultimage"<?php if ($forum_config['o_nl_gravatar_default'] == 'defaultimage') echo ' selected="selected"' ?>><?php echo $lang_nl_gravatar['Default - defaultimage']; ?></option>
			</select></span>
		</div>
	</div>
	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box text">
		<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_nl_gravatar['Default Image'] ?></span><small><?php echo $lang_nl_gravatar['Why Default Image'] ?></small></label><br />
		<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" size="80%" name="form[nl_gravatar_default_image]" value="<?php echo forum_htmlencode($forum_config['o_nl_gravatar_default_image']) ?>" /></span>
		</div>
	</div>
	<?php if ($forum_db->field_exists('users', 'gender')) { ?>
	<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class="sf-box text">
		<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_nl_gravatar['Default Image2'] ?></span><small><?php echo $lang_nl_gravatar['Why Default Image2'] ?></small></label><br />
		<span class="fld-input"><input type="text" id="fld<?php echo $forum_page['fld_count'] ?>" size="80%" name="form[nl_gravatar_default_image2]" value="<?php echo forum_htmlencode($forum_config['o_nl_gravatar_default_image2']) ?>" /></span>
		</div>
	</div>
	<?php } ?>
