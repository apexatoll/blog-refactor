<?php namespace controllers;

class Footer extends Controller {
	public function default(){
		$this->view("default");
	}
	public function show($params){
		$this->view($params['menu']);
	}
}
