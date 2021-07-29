<?php namespace core;

class Database extends Credentials{
	public function __construct(){
		parent::__construct();
		$this->pdo = $this->make_pdo();
	}
	private function dsn(){
		return "mysql:host=".$this->host().";dbname=".$this->name();
	}
	private function make_pdo(){
		return new \PDO($this->dsn(), $this->user(), $this->pass());
	}
}
