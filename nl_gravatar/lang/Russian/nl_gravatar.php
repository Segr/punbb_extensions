<?php
 
$lang_nl_gravatar = array(
	'Allow Gravatars'		=>	'Разрешить граватары',
	'Allow Use'		=>	'Разрешить пользователям использовать граватары',
	'Default Gravatar Width'		=>	'Размер граватара по умолчанию',
	'Default Gravatar'		=>	'Граватар по умолчанию',
	'Default Image'		=>	'Картинка по умолчанию',
	'Gravatar'			=>	'Граватар',
	'Gravatars'			=>	'Граватары',
	'Link To Your Universal Gravatar'			=>	'Включить показ граватара',
	'Use Gravatar'			=>	'Использовать граватар',
	'Use Gravatars'			=>	'Use Gravatars',
	'Use Your Gravatar'		=>	'Вместо аватара, вы можете использовать <a href="http://gravatar.com/" title="Gravatar">Граватар</a> (<b>G</b>lobally <b>R</b>ecognized <b>Avatar</b>).',
	'Uploading Avatar'	=>	'Загруженный аватар имеет больший приоретет.',
	'Gravatar Width'		=>	'Размер граватара в пикселах (рекомендуется 60).',
	'Guest Gravatars'		=>	'Граватары для гостей',
	'Allow Guests'		=>	'Генерировать граватары для гостевых постов',
	'Why Gravatar Default'	=> 'Тип генерируемого автоматически граватара',
	'Why Default Image'		=>	'Картинка по умолчанию, если граватр отсутствует',
	'Gravatar Rating'	=> 'Рейтинг',
	'Why Gravatar Rating' =>	'Показывать граватары с рейтингом',
	'Default - 404' => '\'404\' -- Do not load any image if none is associated with the email',
	'Default - mp' => '\'mp\' -- A simple, cartoon-style silhouetted outline of a person (does not vary by email)',
	'Default - identicon' => '\'identicon\' -- A geometric pattern based on an email hash',
	'Default - monsterid' => '\'monsterid\' -- A generated \'monster\' with different colors, faces, etc',
	'Default - wavatar' => '\'wavatar\' -- Generated faces with differing features and backgrounds',
	'Default - retro' => '\'retro\' -- Awesome generated, 8-bit arcade-style pixelated faces',
	'Default - robohash' => '\'robohash\' -- A generated robot with different colors, faces, etc',
	'Default - blank' => '\'blank\' -- A transparent PNG image (border added to HTML below for demonstration purposes)',
	'Default - defaultimage' => '\'defaultimage\' -- Картинка по умолчанию',
	'Rating - Not Used' => 'Игнорировать',
	'Rating - G' => 'G - подходит для показа на всех сайтах с любым типом аудитории',
	'Rating - PG' => 'PG - может содержать грубые жесты, вызывающе одетых людей, ругательные слова или мягкое насилие',
	'Rating - R' => 'R - может содержать ненормативную лексику, интенсивное насилие, нагота или употребление наркотиков',
	'Rating - X' => 'X - может содержать хардкор, сексуальные образы или чрезвычайное насилие',
);

if ($forum_db->field_exists('users', 'gender')) {
	$lang_nl_gravatar['Default Image'] = 'Аватар для мальчиков';
	$lang_nl_gravatar['Default Image2'] = 'Аватар для девочек';
	$lang_nl_gravatar['Why Default Image'] = 'Картинка по умолчанию для мальчиков, если граватар отсутствует';
	$lang_nl_gravatar['Why Default Image2'] = 'Картинка по умолчанию для девочек, если граватар отсутствует';
}