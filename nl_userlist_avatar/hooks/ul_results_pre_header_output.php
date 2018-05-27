<?php
if (!defined('FORUM')) die();

array_insert ($forum_page['table_header'], 1, '<th class="tc'.(count($forum_page['table_header'])+1).'" scope="col">'.$lang_nl_userlist_avatar['Userlist Table Header'].'</th>', 'avatar');
