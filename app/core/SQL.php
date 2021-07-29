<?php namespace core;

class SQL {
	public function __construct($table){
		$this->table = $table;
	}
	public function insert(array $values){
		return "INSERT INTO $this->table ".$this->values_string($values);
	}
	public function select($where = null, $cols = "*"){
		return "SELECT $cols FROM $this->table".
			($where ? " ".$this->where_string($where) : "");
	}
	private function values_string(array $values){
		return "SET ".$this->placehold($values, ", ");
	}
	private function where_string(array $where, $op="AND"){
		return "WHERE ".$this->placehold($where, " $op ");
	}
	private function placehold(array $data, $glue){
		foreach(array_keys($data) as $col)
			$a[]= "$col = :$col";
		return implode($glue, $a);
	}
}
