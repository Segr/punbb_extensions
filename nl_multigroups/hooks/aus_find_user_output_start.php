<?
if (!defined('FORUM')) die();

if (count($conditions)>0) {
	echo '<div class="ct-box info-box">';
	foreach ($conditions as $condition) {
		echo $condition.'<br>';
	}
	echo '</div>';
}