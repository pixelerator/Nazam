<?php
function p($var) {

	echo '<pre>';
	print_r($var);
	echo '</pre>';

}
/*
 * CURRENT : Current Working Directory
 * SEP : Directory Seprator
 * BASEFOLDER: ROOT Folder Name
 */
if (!defined('CURRENT')) {
	define('CURRENT', getcwd());
}
if (!defined('SEP')) {
	define('SEP', '/');
}
if (!defined('BASEFOLDER')) {
	 $url=explode('\\', CURRENT);
	define('BASEFOLDER', $url[count($url)-1]);
}
p(MapUrl());
function MapUrl(){
$keywords = preg_split('/'.BASEFOLDER.'\//',$_SERVER['REQUEST_URI']);
p($keywords);
return explode('/',$keywords[1]);
}

?>