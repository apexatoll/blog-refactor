<?php namespace controllers;

class Users extends Controller {
	public function register($input){
		$user = new \models\Register($input);
		$user->validate()->create();
		return "you may now log in";
	}
	public function login($attempt){
		$user = new \models\User;
		$user->login($attempt);
		//print_r($attempt);
	}
}
