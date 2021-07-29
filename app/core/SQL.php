<?php namespace core;

require_once(__DIR__."/../config/config.php");
\core\Loader::initialize();
\config\Env::initialize();

class SQL {
	public function __construct($table){
		$this->table = $table;
	}
	public function insert(array $values){
		return sprintf("INSERT INTO %s%s", $this->table, $this->values($values));
		//return "INSERT INTO $this->table ".$this->values_string($values);
	}
	public function select($where=null, $order=null, $cols="*"){
		return implode(" ", [ 
			"SELECT $cols FROM $this->table",
			$this->where($where),
			$this->order($order)
		]);
		//return sprintf("SELECT %s FROM %s%s", $cols, $this->table, implode(" ", $params));
		//return $this->string("SELECT $cols FROM $this->table", [$this->where($where)], " ");
		//return sprintf("SELECT %s FROM %s%s", 
			//$cols, $this->table, $this->where($where));
		//return "SELECT $cols FROM $this->table".
			//($where ? " ".$this->where_string($where) : "");
	}
	private function order($order){
		if(!empty($order)){
			foreach($order as $col => $dir)
				$a[]= "$col $dir";
			return "ORDER BY ".implode(", ", $a);
		}
	}
	private function values($values){
		return $this->string("SET", $values, ", ");
	}
	private function where($where, $op="AND"){
		return $this->string("WHERE", $where, " $op ");
	}
	private function string($pre, $values, $glue){
		if($values)
			return sprintf("%s %s", $pre, 
				$this->placehold($values, $glue)
			);
	}
	private function placehold(array $data, $glue){
		foreach(array_keys($data) as $col)
			$a[]= "$col = :$col";
		return implode($glue, $a);
	}
}


//$s = new SQL("users");

//echo $s->select(["username"=>"admin", "password"=>"test"], ["username"=>"ASC", "password"=>"DESC"]);
