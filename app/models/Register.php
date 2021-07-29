<?php namespace models;

class Register extends Model {
	protected $required = [
		"name", "username", "email", "password", "confirm_password"
	];
	public function __construct($input){
		parent::__construct("users");
		$this->instantiate($input);
	}
	public function validate(){
		$this->validate_required_fields()
			->validate_passwords_match()
			->validate_email_structure()
			->validate_unique();
		return $this;
	}
	public function create(){
		$this->insert($this->build());
	}
	private function validate_passwords_match(){
		if($this->password !== $this->confirm_password)
			$this->error("passwords do not match");
		return $this;
	}
	private function validate_email_structure(){
		if(!$this->valid_email($this->email))
			$this->error("invalid email");
		return $this;
	}
	private function valid_email($email){
		$chars = "[A-z0-9\.-]";
		$regex = "/^$chars+@$chars+\.[A-z0-9]+$/";
		return preg_match($regex, $email);
	}
	private function validate_unique(){
		foreach(["username", "email"] as $col)
			if($this->user_exists([$col=>$this->$col]))
				$this->error("$col exists");
	}
	private function user_exists(array $params){
		return count($this->select($params)) != 0;
	}
	private function build(){
		foreach($this->required as $col)
			$data[$col] = $this->$col;
		unset($data['confirm_password']);
		$data['password'] = $this->hash($this->password);
		return $data;
	}
	private function hash($password){
		return password_hash($password, PASSWORD_DEFAULT);
	}
}
