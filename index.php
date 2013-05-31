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



try {
require_once(CURRENT.SEP.APPFOLDER.SEP.'base'.EXTENSION);
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}


?>