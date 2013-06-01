<?php
p($this);
class Core {
	var $contoller;
	var $model;
	var $data;
	var $cview;
	var $view;
	var $layout;
	var $metas;
	var $actiotoview;
	
	
	static function initialize($controller,$parameters,$skey){
		$controller= new $controller;
		$string=implode(',', $parameters);
	    $function="";
		foreach ($parameters as $key => $value) {
					if (next($parameters) === false) {
						$function.=$value;
					}else{
			$function.=$value.',';
			}
					$parameters[]=$skey;
			
		}
		call_user_func_array(array($controller,'index'), $parameters);
		
	}
}

try {
	require_once (CURRENT . SEP . APPFOLDER . SEP . 'controller' . SEP . $this -> controller . EXTENSION);
	try {
		require_once (CURRENT . SEP . APPFOLDER . SEP . 'model' . SEP . $this -> controller . EXTENSION);
         Core::initialize($this -> controller,$this->parameteres,$this->key);
		
		

	} catch (Exception $e) {
		echo 'Caught exception: ', $e -> getMessage(), "\n";
	}

} catch (Exception $e) {
	echo 'Caught exception: ', $e -> getMessage(), "\n";
}
?>