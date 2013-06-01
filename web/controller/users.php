<?php
class Users extends Controller {
	var $test=1;
	

	function includer($parameters,$action,$local_controller,$link_function=null) {
			try{
				require_once (CURRENT . SEP . APPFOLDER . SEP . 'functions' . SEP .$local_controller.SEP.$action. EXTENSION);
				
				call_user_func_array($action,$parameters);
			}catch(Exception $e){
				echo 'Caught exception: ', $e -> getMessage(), "\n";
			}
	}

}
?>