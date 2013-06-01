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
	var $action;

	static function initialize($controller, $parameters, $skey, $action) {
		$local_controller = $controller;
		$controller = new $controller;
		$string = implode(',', $parameters);
		$function = "";
		foreach ($parameters as $key => $value) {
			if (next($parameters) === false) {
				$function .= $value;
			} else {
				$function .= $value . ',';
			}
			$parameters[] = $skey;

		}

		//call_user_func_array(array($controller,'includer'), $parameters);
		$controller -> includer($parameters, $action, $local_controller);
		//$controller->bar= Closure::bind($controller,function(){return $this->test;});
		//echo call_user_func($controller->bar);
		// $controller->cb = function($who,$controller) { p($controller);  };
		// echo $controller->cb('World',$controller);

	}

}

try {
	require_once (CURRENT . SEP . APPFOLDER . SEP . 'core' . SEP . 'controller' . EXTENSION);
	try {
		require_once (CURRENT . SEP . APPFOLDER . SEP . 'core' . SEP . 'model' . EXTENSION);
		try {
			require_once (CURRENT . SEP . APPFOLDER . SEP . 'controller' . SEP . $this -> controller . EXTENSION);
			try {
				require_once (CURRENT . SEP . APPFOLDER . SEP . 'model' . SEP . $this -> controller . EXTENSION);

				Core::initialize($this -> controller, $this -> parameteres, $this -> key, $this -> action);

			} catch (Exception $e) {
				echo 'Caught exception: ', $e -> getMessage(), "\n";
			}

		} catch (Exception $e) {
			echo 'Caught exception: ', $e -> getMessage(), "\n";
		}

	} catch(Exception $e) {
		echo 'Caught exception: ', $e -> getMessage(), "\n";
	}

} catch(Exception $e) {
	echo 'Caught exception: ', $e -> getMessage(), "\n";
}
?>