<?php namespace controllers;

class Popups extends Controller {
	public function signup(){
		$this->view("signup", ["title"=>"Sign Up", "buttons"=>["submit"=>"Sign Up", "cancel"=>"Cancel"]]);
	}
}
