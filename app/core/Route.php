<?php namespace core;

class Route {
	public function __construct($path, $cb){
		$this->pattern = $this->make_pattern($path);
		$this->p_holds = $this->parse_placeholders($path);
		$this->ctrl    = $this->parse_ctrl($cb);
		$this->method  = $this->parse_method($cb);
	}
	public function matches_uri($uri){
		return preg_match($this->pattern, $uri);
	}
	public function call($uri){
		return call_user_func_array(
			[$this->ctrl, $this->method], 
			[$this->set_params($uri)]
		);
	}
	private function make_pattern($path){
		return "%^".
			preg_replace("/:[A-z]+/", "([^\/]+)", $path).
		"$%";
	}
	private function parse_ctrl($cb){
		$ctrl = (
			"\\controllers\\".preg_replace("/#.*$/", "", $cb)
		);
		return new $ctrl;
	}
	private function parse_method($cb){
		return preg_replace("/^.*#/", "", $cb);
	}
	private function parse_placeholders($path){
		preg_match_all("/(?<=:)[A-z]+/", $path, $ph);
		return count($ph[0]) > 0 ? $ph[0] : null;
	}
	private function set_params($uri){
		return isset($this->p_holds) ?
			$this->extract_variables($uri) :
			$_POST;
	}
	public function extract_variables($uri){
		preg_match($this->pattern, $uri, $vars);
		return array_combine(
			$this->p_holds, array_slice($vars, 1)
		);
	}
}
