<?php

if (!defined('FORUM')) die(); 

//Language files!
if (file_exists($ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php'))
	include $ext_info['path'].'/lang/'.$forum_user['language'].'/'.$ext_info['id'].'.php';
else
	include $ext_info['path'].'/lang/English/'.$ext_info['id'].'.php';
			
// Setup form
$forum_page['group_count'] = $forum_page['item_count'] = $forum_page['fld_count'] = 0;
$forum_page['form_action'] = forum_link($forum_url['login']);

$forum_page['hidden_fields'] = array(
	'form_sent'		=> '<input type="hidden" name="form_sent" value="1" />',
	'redirect_url'	=> '<input type="hidden" name="redirect_url" value="'.forum_htmlencode($forum_user['prev_url']).'" />',
	'csrf_token'	=> '<input type="hidden" name="csrf_token" value="'.generate_form_token($forum_page['form_action']).'" />'
);
?>
	<div id="pan_login_form">
	<form method="post"></form>
	
		<div class="main-head">
			<h2 class="hn"><span><?php echo sprintf($lang_pan_login_form['Login info'], $forum_config['o_board_title']) ?></span><strong class="pan_login_form_close">x</strong></h2>
		</div>
		
		<form class="frm-form" method="post" accept-charset="utf-8" action="<?php echo $forum_page['form_action'] ?>">
			<div class="hidden">
				<?php echo implode("\n\t\t\t\t", $forum_page['hidden_fields'])."\n" ?>
			</div>
			
			<div class="sf-box text required">
				<span class="fld-input"><input type="text" name="req_username" value="<?php if (isset($_POST['req_username'])) echo forum_htmlencode($_POST['req_username']); ?>" size="25" maxlength="25" required spellcheck="false" placeholder="<?php echo $lang_pan_login_form['login']; ?>" /></span>
			</div>
			
			<div class="sf-box text required">
				<span class="fld-input"><input type="password" name="req_password" value="<?php if (isset($_POST['req_password'])) echo forum_htmlencode($_POST['req_password']); ?>" size="25" required placeholder="<?php echo $lang_pan_login_form['password']; ?>" /></span>
			</div>
			
			<div class="sf-box checkbox">
				<span class="fld-input" style="float:left;"><input type="checkbox" name="save_pass" value="1"<?php if (isset($_POST['save_pass'])) echo ' checked="checked"'; ?> /></span>
				<span style="position: relative;margin-left: 5px;top: 1px;"><?php echo $lang_pan_login_form['Remember me']; ?></span>
				<span class="submit primary" style="float:right;"><input type="submit" name="login" value="<?php echo $lang_pan_login_form['Login']; ?>" /></span>
			</div>
			<div class="sf-box">
				<?php printf($lang_pan_login_form['Login options'], '<a href="'.forum_link($forum_url['register']).'">'.$lang_pan_login_form['register'].'</a>', '<a href="'.forum_link($forum_url['request_password']).'">'.$lang_pan_login_form['Obtain pass'].'</a>') ?>
			</div>
			
		</form>
	</div>
	
	<div class="pan_login_form_overlay"></div>




