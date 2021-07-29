<?php namespace controllers;

class Controller extends \core\View {
	protected function view($file, $params=[]){
		$content = $this->view_path($file);
		foreach($params as $k => $v) $$k = $v;
		require_once($this->view_path("layout"));
	}
	protected function view_path($file){
		return APP."/views/".$this->dir()."/$file.php";
	}
	protected function dir(){
		return strtolower(preg_replace("/^.*\\\/", "", get_class($this)));
	}
}
