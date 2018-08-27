<?php
if (!defined('FORUM')) die();
 
$lang_nl_gravatar = array(
	'Allow Gravatars' =>                  'Разрешить граватары',
	'Allow Use' =>                        'Разрешить пользователям использовать граватары',
	'Default Gravatar Width' =>           'Размер граватара',
	'Default Gravatar' =>                 'Граватар по умолчанию',
	'Default Image' =>                    'Картинка по умолчанию',
	'Gravatar' =>                         'Граватар',
	'Gravatars' =>                        'Граватары',
	'Use Gravatar' =>                     'Граватар',
	'Why Use Grawatar' =>                 'Показывать граватар если нет аватара',
	'Use Gravatars' =>                    'Use Gravatars',
	'Use Your Gravatar' =>                'Вместо аватара, вы можете использовать <a href="http://gravatar.com/" title="Gravatar">Граватар</a> (<b>G</b>lobally <b>R</b>ecognized <b>Avatar</b>).',
	'Uploading Avatar' =>                 'Загруженный аватар имеет больший приоретет.',
	'Gravatar Width' =>                   'Размер граватара в пикселах (рекомендуется 60). Ширина равна высоте, граватары квадратные.',
	'Guest Gravatars' =>                  'Для гостей',
	'Allow Guests' =>                     'Показвать граватары в постах от гостей',
	'Why Gravatar Default' =>             'Тип генерируемого автоматически граватара',
	'Why Default Image' =>                'Картинка по умолчанию, если граватар отсутствует',
	'Gravatar Rating' =>                  'Рейтинг',
	'Why Gravatar Rating' =>              'Показывать граватары с рейтингом',
	'Default - 404' =>                    '\'404\' -- Do not load any image if none is associated with the email',
	'Default - mp' =>                     '\'mp\' -- A simple, cartoon-style silhouetted outline of a person (does not vary by email)',
	'Default - identicon' =>              '\'identicon\' -- A geometric pattern based on an email hash',
	'Default - monsterid' =>              '\'monsterid\' -- A generated \'monster\' with different colors, faces, etc',
	'Default - wavatar' =>                '\'wavatar\' -- Generated faces with differing features and backgrounds',
	'Default - retro' =>                  '\'retro\' -- Awesome generated, 8-bit arcade-style pixelated faces',
	'Default - robohash' =>               '\'robohash\' -- A generated robot with different colors, faces, etc',
	'Default - blank' =>                  '\'blank\' -- A transparent PNG image (border added to HTML below for demonstration purposes)',
	'Default - defaultimage' =>           '\'defaultimage\' -- Картинка по умолчанию',
	'Rating - Not Used' =>                'Игнорировать',
	'Rating - G' =>                       'G - подходит для показа на всех сайтах с любым типом аудитории',
	'Rating - PG' =>                      'PG - может содержать грубые жесты, вызывающе одетых людей, ругательные слова или мягкое насилие',
	'Rating - R' =>                       'R - может содержать ненормативную лексику, интенсивное насилие, нагота или употребление наркотиков',
	'Rating - X' =>                       'X - может содержать хардкор, сексуальные образы или чрезвычайное насилие',
	'Current avatar' =>                   'Ваш граватар',
	'Delete avatar info' =>               'Отключите граватар, чтобы прекратить его отображение.',
	'Go to settings' =>                   'Настройки',
);

if (NL_GRAVATAR_USER_HAS_GENDER) {
	$lang_nl_gravatar['Default Image2'] =     'Для девочек';
	$lang_nl_gravatar['Why Default Image2'] = 'Картинка по умолчанию для девочек, если граватар отсутствует';
}