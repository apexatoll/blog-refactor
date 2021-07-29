<?php namespace core;

class Credentials {
	private $host, $user, $pass, $name;
	protected function __construct(){
		DEV ? 
			$this->instantiate_dev() : 
			$this->instantiate_live();
	}
	private function instantiate_dev(){
		$this->host = "127.0.0.1";
		$this->user = "root";
		$this->pass = "";
		$this->name = "code";
	}
	private function instantiate_live(){
		$this->host = "127.0.0.1";
		$this->user = "root";
		$this->pass = "";
		$this->name = "code";
	}
	protected function host(){
		return $this->host;
	}
	protected function user(){
		return $this->user;
	}
	protected function pass(){
		return $this->pass;
	}
	protected function name(){
		return $this->name;
	}
}
