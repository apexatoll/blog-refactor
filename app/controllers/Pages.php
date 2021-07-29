<?php namespace controllers;

class Pages extends Controller {
	public function index(){
		$this->view("index", ["title"=>"home"]);
	}
	public function posts(){
		$this->view("posts", ["title"=>"posts"]);
	}
	public function contact(){
		$this->view("contact", ["title"=>"contact"]);
	}
	public function about(){
		$this->view("about", ["title"=>"about"]);
	}
}
