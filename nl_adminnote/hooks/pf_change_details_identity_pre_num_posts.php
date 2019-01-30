<?php
if (!defined('FORUM')) die();

ob_end_clean();

if ($forum_user['is_admmod']) { ?>
	<div class="txt-set set<?php echo ++$forum_page['item_count'] ?>">
		<div class=txt-box textarea">
			<label for="fld<?php echo ++$forum_page['fld_count'] ?>"><span><?php echo $lang_profile['Admin note'] ?></span></label>
			<div class="txt-input"><span class="fld-input"><textarea id="fld<?php echo $forum_page['fld_count'] ?>" name="admin_note" rows="4" cols="65"><?php echo(isset($_POST['admin_note']) ? forum_htmlencode($_POST['admin_note']) : forum_htmlencode($user['admin_note'])) ?></textarea></span></div>
		</div>
	</div>
<?php }