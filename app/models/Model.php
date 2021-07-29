<?php namespace models; 

//require_once(__DIR__."/../config/config.php");
//\core\Loader::initialize();

abstract class Model extends \core\SQL {

	protected const RULE_REQ   = 'val_req';
	protected const RULE_EMAIL = 'val_email';
	protected const RULE_MATCH = 'val_match';
	protected const RULE_UNIQ  = 'val_uniq';

	abstract protected function rules();

	public function __construct($table){
		parent::__construct($table);
		$this->db = new \core\Database;
	}
	public function load(array $data){
		foreach($data as $k => $v)
			if(property_exists($this, $k))
				$this->$k = $v;
	}
	public function validate(){
		foreach($this->rules() as $rule => $params)
			foreach($params as $group)
				$this->validate_rule($rule, $group);
		return $this;
	}
	private function validate_rule($rule, $params){
		call_user_func([$this, $rule], $params);
	}
	private function val_req($field){
		if(empty($this->$field))
			$this->error("$field empty");
	}
	private function val_email($email){
		if(!filter_var($this->$email, FILTER_VALIDATE_EMAIL))
			$this->error("invalid email");
	}
	private function val_match($group){
		$arr = array_map(function($e){return $this->$e;}, $group['values']);
		if(count(array_unique($arr)) != 1)
			$this->error($group['name']." do not match");
	}
	private function error($message){
		throw new \Exception($message);
	}
	private function val_uniq($col){
		if(count($this->select([$col=>$this->$col])) != 0)
			$this->error("$col exists");
	}
	public function select($where=null, $order=null, $cols="*"){
		$stmt = $this->prepare(parent::select($where, $cols));
		$stmt->execute($where);
		return $stmt->fetchAll(\PDO::FETCH_ASSOC);
	}
	public function insert($values){
		$stmt = $this->prepare(parent::insert($values));
		$stmt->execute($values);
		return $this->new_id();
	}
	private function prepare($sql){
		return $this->db->pdo->prepare($sql);
	}
	private function new_id(){
		return $this->db->pdo->lastInsertId();
	}
}
