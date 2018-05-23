<?php
if (!defined('FORUM')) die();

// lang
global $lang_nl_gravatar;
if (!isset($lang_nl_gravatar)) {
	if (file_exists($ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php'))
		include $ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php';
	else
		include $ext_info['path'].'/lang/English/'.$ext_info['id'].'.php';
}

if($section == 'nl_gravatar' && $forum_config['o_nl_gravatar'] == '1'){
	


// Check for use of incorrect URLs
//confirm_current_url(forum_link($forum_url['profile_nl_gravatar'], $id));

// Setup the form
$forum_page['group_count'] = $forum_page['item_count'] = $forum_page['fld_count'] = 0;
$forum_page['form_action'] = forum_link($forum_url['profile_nl_gravatar'], $id);

$forum_page['hidden_fields'] = array(
	'form_sent'		=> '<input type="hidden" name="form_sent" value="1" />',
	'csrf_token'	=> '<input type="hidden" name="csrf_token" value="'.generate_form_token($forum_page['form_action']).'" />'
);

// Setup form information
$forum_page['frm_info'] = array();

// Setup headings
//$forum_page['main_head'] = sprintf(forum_htmlencode(end($forum_page['crumbs'])), $lang_profile['Section avatar']);
$forum_page['crumbs'] = array(
array($forum_config['o_board_title'], forum_link($forum_url['index'])),
array(sprintf($lang_profile['Users profile'], $user['username']), forum_link($forum_url['user'], $id)),
array($lang_nl_gravatar['Gravatar'],forum_link($forum_url['profile_nl_gravatar'], $id))
);
($hook = get_hook('pf_change_details_gravatar_pre_header_load')) ? (defined('FORUM_USE_INCLUDE') ? include $hook : eval($hook)) : null;

define('FORUM_PAGE', 'profile-gravatar');
require FORUM_ROOT.'header.php';

// START SUBST - <!-- forum_main -->
ob_start();

($hook = get_hook('pf_change_details_gravatar_output_start')) ? (defined('FORUM_USE_INCLUDE') ? include $hook : eval($hook)) : null;

?>
	<div class="main-content main-frm">
<?php

		// If there were any errors, show them
		if (!empty($errors))
		{
			$forum_page['errors'] = array();
			foreach ($errors as $cur_error)
				$forum_page['errors'][] = '<li class="warn"><span>'.$cur_error.'</span></li>';

			($hook = get_hook('pf_change_details_gravatar_pre_errors')) ? (defined('FORUM_USE_INCLUDE') ? include $hook : eval($hook)) : null;

?>
		<div class="ct-box error-box">
			<h2 class="warn"><?php echo $lang_profile['Profile update errors'] ?></h2>
			<ul class="error-list">
				<?php echo implode("\n\t\t\t", $forum_page['errors'])."\n" ?>
			</ul>
		</div>
<?php

		}

?>
		<form class="frm-form" method="post" accept-charset="utf-8" action="<?php echo $forum_page['form_action'] ?>">
			<div class="hidden">
				<?php echo implode("\n\t\t\t\t", $forum_page['hidden_fields'])."\n" ?>
			</div>
			<?php 
			if ($forum_config['o_avatars'] != '0'){
			?>
			<div class="ct-box info-box">
				<p><?php echo $lang_nl_gravatar['Use Your Gravatar']; ?></p>
				<p><?php echo $lang_nl_gravatar['Uploading Avatar']; ?></p>
			</div>
			<?php
			}
			?>

<?php ($hook = get_hook('pf_change_details_gravatar_pre_fieldset')) ? (defined('FORUM_USE_INCLUDE') ? include $hook : eval($hook)) : null; ?>
			<fieldset class="frm-group group<?php echo ++$forum_page['group_count'] ?>">
				<legend class="group-legend"><strong><?php echo $lang_nl_gravatar['Gravatar'] ?></strong></legend>
<?php ($hook = get_hook('pf_change_details_gravatar_pre_cur_gravatar_info')) ? (defined('FORUM_USE_INCLUDE') ? include $hook : eval($hook)) : null; ?>
				<div class="sf-set set<?php echo ++$forum_page['item_count'] ?>">
					<div class="sf-box checkbox">
						<span class="fld-input"><input type="checkbox" id="fld<?php echo ++$forum_page['fld_count'] ?>" name="form[nl_gravatar]" value="1" <?php if ($user['nl_gravatar'] == 1) echo 'checked="checked" ' ?>/></span>
						<label for="fld<?php echo $forum_page['fld_count'] ?>"><span><?php echo $lang_nl_gravatar['Use Gravatar'] ?></span> <?php echo $lang_nl_gravatar['Link To Your Universal Gravatar']; ?></label>
					</div>
				</div>
			</fieldset>
<?php ($hook = get_hook('pf_change_details_gravatar_fieldset_end')) ? (defined('FORUM_USE_INCLUDE') ? include $hook : eval($hook)) : null; ?>
			<div class="frm-buttons">
				<span class="submit"><input type="submit" name="update" value="<?php echo $lang_profile['Update profile'] ?>" /> <?php echo $lang_profile['Instructions'] ?></span>
			</div>
		</form>
	</div>
<?php

		($hook = get_hook('pf_change_details_gravatar_end')) ? (defined('FORUM_USE_INCLUDE') ? include $hook : eval($hook)) : null;

		$tpl_temp = forum_trim(ob_get_contents());
		$tpl_main = str_replace('<!-- forum_main -->', $tpl_temp, $tpl_main);
		ob_end_clean();
		// END SUBST - <!-- forum_main -->

		require FORUM_ROOT.'footer.php';

}
			
