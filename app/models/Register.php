<?php namespace models;

class Register extends Model {
	protected $name, $username, $email, $password, $confirm_password;

	public function __construct(){
		parent::__construct("users");
	}
	protected function rules(){
		return [
			self::RULE_REQ => [ 
				"name", 
				"username", 
				"email", 
				"password", 
				"confirm_password"
			], 
			self::RULE_MATCH => [[ 
				"name"   => "passwords",
				"values" => ["password", "confirm_password"]]
			], 
			self::RULE_EMAIL => [ "email" ], 
			self::RULE_UNIQ  => [ "username", "email" ]
		];
	}
	public function create(){
		$this->insert($this->build());
	}
	private function build(){
		foreach($this->rules()[self::RULE_REQ] as $col)
			$data[$col] = $this->$col;
		unset($data['confirm_password']);
		$data['password'] = $this->hash($this->password);
		return $data;
	}
	private function hash($password){
		return password_hash($password, PASSWORD_DEFAULT);
	}
}
