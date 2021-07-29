<?php namespace models; 

//require_once(__DIR__."/../config/config.php");
//\core\Loader::initialize();

class User extends Model {
	//public function __construct(){
		//parent::__construct("users");
	//}
	//public function load($where){
		//if(gettype($where) == "integer")
			//$where = ["id"=>$where];
		//$u = $this->select($where)[0] ?? null;
		//if($u){
			//$this->instantiate($u);
			//return true;
		//}
		//return false;
	//}


	//public function login($attempt){
		//$this->instantiate($attempt);
		//$this->validate_required_fields(["username", "password"]);
		//$user = $this->find(["username"=>$this->username]) ?? $this->find(["email"=>$this->username]);
		//$this->instantiate((array) $user[0]);
		//if($this->verify_password($attempt['password'])){
			//$this->start_session();
			////echo "correct password";
		//}else {
			////echo "incorrect password";
		//}
	//}
	////public function find($params){
		////return $this->select($params);
	////}
	//private function verify_password($attempt){
		//return password_verify($attempt, $this->password);
	//}
	//private function start_session(){
		//foreach(["id", "username", "type"] as $col){
			//$_SESSION[$col] = $this->$col;
		//}
	//}
}

//$u = new User;
//$u->load(["username"=>"admin"]);
//print_r($u);
