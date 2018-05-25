<?php
if (!defined('FORUM')) die();
 
$lang_nl_gravatar = array(
	'Allow Gravatars' =>                  'Allow Gravatars',
	'Allow Use' =>                        'Allow users to use their Gravatar',
	'Default Gravatar Width' =>           'Default Gravatar Size',
	'Default Gravatar' =>                 'Default Gravatar',
	'Default Image' =>                    'Default Image',
	'Gravatar' =>                         'Gravatar',
	'Gravatars' =>                        'Gravatars',
	'Link To Your Universal Gravatar' =>  'Link To Your Universal Gravatar',
	'Use Gravatar' =>                     'Use Gravatar',
	'Use Gravatars' =>                    'Use Gravatars',
	'Use Your Gravatar' =>                'Use your <a href="http://gravatar.com/" title="Gravatar">globally recognized avatar</a>',
	'Uploading Avatar' =>                 'Uploaded Avatars take precedence',
	'Gravatar Width' =>                   'Pixels (60 is recommended).',
	'Guest Gravatars' =>                  'Gravatars for guests.',
	'Allow Guests' =>                     'Gravatars will be shown for all guest posts',
	'Why Gravatar Default' =>             'For when users don\'t have a gravatar but check the box anyway... (Mystery man for guests, Gravatar Logo for members)',
	'Why Default Image' =>                'Картинка по умолчанию если граватр отсутствует',
	'Gravatar Rating' =>                  'Gravatar Rating',
	'Why Gravatar Rating' =>              'Gravatar attempts to classify the avatar',
	'Default - 404' =>                    '\'404\' -- Do not load any image if none is associated with the email',
	'Default - mp' =>                     '\'mp\' -- A simple, cartoon-style silhouetted outline of a person (does not vary by email)',
	'Default - identicon' =>              '\'identicon\' -- A geometric pattern based on an email hash',
	'Default - monsterid' =>              '\'monsterid\' -- A generated \'monster\' with different colors, faces, etc',
	'Default - wavatar' =>                '\'wavatar\' -- Generated faces with differing features and backgrounds',
	'Default - retro' =>                  '\'retro\' -- Awesome generated, 8-bit arcade-style pixelated faces',
	'Default - robohash' =>               '\'robohash\' -- A generated robot with different colors, faces, etc',
	'Default - blank' =>                  '\'blank\' -- A transparent PNG image (border added to HTML below for demonstration purposes)',
	'Default - defaultimage' =>           '\'defaultimage\' -- Default Image',
	'Rating - Not Used' =>                'Not Used',
	'Rating - G' =>                       'G - suitable for display on all websites with any audience type',
	'Rating - PG' =>                      'PG - may contain rude gestures, provocatively dressed individuals, the lesser swear words, or mild violence',
	'Rating - R' =>                       'R - may contain such things as harsh profanity, intense violence, nudity, or hard drug use',
	'Rating - X' =>                       'X - may contain hardcore sexual imagery or extremely disturbing violence',
	'Current avatar' =>                   'Your Gravatar',
	'Delete avatar info' =>               'Disable gravatar to stop displaying any avatar.',
	'Go to settings' =>                   'Settings',
);

if ($forum_db->field_exists('users', 'gender')) {
	$lang_nl_gravatar['Default Image2'] =     'Default Female Image';
	$lang_nl_gravatar['Why Default Image2'] = 'Картинка по умолчанию для девочек, если граватар отсутствует';
}