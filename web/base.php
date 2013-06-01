<?php
class base {
	var $page;
	var $controller;
	var $action;
	var $parameteres;
	var $key;
	var $page_status = false;
	/*
	 * Function for dispatching
	 * created 30-5-2013
	 */
	/*
	 * Function MapUrl
	 * This Function is used to get the URL Patterns easiliy
	 * Created date 30/5/2013
	 */
	function MapUrl() {
		$keywords = preg_split('/' . BASEFOLDER . '\//', $_SERVER['REQUEST_URI']);
		return explode('/', $keywords[1]);
	}

	function UrlDeep() {
		$exploded_url = $this -> MapUrl();
		try {
			$count = count($exploded_url);
			if ($count < 3) {

				trigger_error("Please check the URl");

			} else {
				if (empty($exploded_url[count($exploded_url) - 1])) {
					trigger_error("Please check the URl");
					die("Key Doesnot exist");

				}
				if (strpos($exploded_url[count($exploded_url) - 1], '.html') == false) {
					trigger_error("Please check the URl");
					die("Extension Required");
				}

				p($exploded_url);
				$this -> controller = $exploded_url[0];
				$this -> action = $exploded_url[1];
				unset($exploded_url[0]);
				unset($exploded_url[1]);
				$action = array();
				if ($exploded_url[2] != 'page') {
					$i = 1;
					foreach ($exploded_url as $key => $value) {
						if ($i == count($exploded_url)) {
							break;
						} else {
							$this -> parameteres[] = $value;
						}
						$i++;
					}

				} else {
					p($exploded_url);
					if (count($exploded_url) < 3) {
						trigger_error("Please check your URL Page Paramters");
						die();
					} else {
						if (!is_numeric($exploded_url[3])) {
							trigger_error("Page Number Not defined");
							die();
						}
					}

					$this -> page = $exploded_url[3];
					$this -> page_status = TRUE;
					unset($exploded_url[2]);
					unset($exploded_url[3]);
					$i = 0;
					foreach ($exploded_url as $key => $value) {
						if ($i == count($exploded_url)) {
							break;
						} else {

							$this -> parameteres[] = $value;
						}
						$i++;
					}

				}

				foreach ($exploded_url as $key => $value) {
					if (next($exploded_url) === false) {
						$this -> key = $value;
					}
				}
				try {
					require_once (CURRENT . SEP . APPFOLDER . SEP . 'core' . EXTENSION);
					
				} catch (Exception $e) {
					echo 'Caught exception: ', $e -> getMessage(), "\n";
				}

				
			}

		} catch(exception $e) {
			trigger_error("Please check the URL");

		}

	}

}

$instance = new base();
$instance -> UrlDeep();
?>