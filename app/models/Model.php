<?php namespace models; 

//require_once(__DIR__."/../config/config.php");
//\core\Loader::initialize();

abstract class Model extends \core\SQL {
	//protected const RULE_REQUIRED = 'required';

	public function __construct($table){
		parent::__construct($table);
		$this->db = new \core\Database;
	}
	public function select($where=null, $cols="*"){
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
	protected function instantiate(array $input){
		foreach($input as $k => $v)
			$this->$k = $v;
	}
	protected function validate_required_fields($fields=null){
		foreach($fields ?? $this->required as $field)
			if(empty($this->$field))
				$this->error("$field empty");
		return $this;
	}
	protected function error($message){
		throw new \Exception($message);
	}
}

//$m = new Model("users");
