<?php
function p($var) {

	echo '<pre>';
	print_r($var);
	echo '</pre>';

}

if (!defined('CURRENT')) {
	define('CURRENT', getcwd());
}
if (!defined('SEP')) {
	define('SEP', '/');
}

?>