<?php
class base {
	var $page;
	var $controller;
	var $action;
	var $parameteres;
	var $key;
	var $page_status=false;
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
		try{
			$count=count($exploded_url);
			if($count<3){
				trigger_error("Please check the URl");
				
			}else{
				p($exploded_url);
				$this->controller=$exploded_url[0];
				$this->action=$exploded_url[1];
				unset($exploded_url[0]);
				unset($exploded_url[1]);
				$action=array();
				if($exploded_url[2]!='page'){
					$i=1;
					foreach ($exploded_url as $key => $value) {
						if($i==count($exploded_url)-1){
							break;	
						}else{
							$this->parameteres[]=$value;
						}
						$i++;
					}
					
				}else{
					$this->page=$exploded_url[3];
					$this->page_status=TRUE;
					unset($exploded_url[2]);
					unset($exploded_url[3]);
								$i=0;
					foreach ($exploded_url as $key => $value) {
						if($i==count($exploded_url)-1){
							break;	
						}else{
							
							$this->parameteres[]=$value;
						}
						$i++;
					}
					
				}
				
				p($this);
			}
			
		}catch(exception $e){
			trigger_error("Please check the URL");
			
		}

	}

}

$instance = new base();
$instance -> UrlDeep();
?>