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
	define('SEP', '\\');
}
if (!defined('BASEFOLDER')) {
	$url = explode('\\', CURRENT);
	define('BASEFOLDER', $url[count($url) - 1]);
}
if (!defined('APPFOLDER')) {
	
	define('APPFOLDER','web');
}
if (!defined('EXTENSION')) {
	
	define('EXTENSION','.php');
}
UrlDeep();
function UrlDeep(){
	$exploded_url=MapUrl();
	p($exploded_url);
	
}
/*
 * Function MapUrl
 * This Function is used to get the URL Patterns easiliy
 * Created date 30/5/2013
 */
function MapUrl() {
	$keywords = preg_split('/' . BASEFOLDER . '\//', $_SERVER['REQUEST_URI']);
	//p($keywords);
	return explode('/', $keywords[1]);
}
require_once(CURRENT.SEP.APPFOLDER.SEP.'base'.EXTENSION);

?>