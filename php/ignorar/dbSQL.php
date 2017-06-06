<?php

class dbSQL extends Database{
	public $pdo;

	function __construct ($table){
		$this->$tableName = $table;
		//$pdo = new conecction;
		$this->setPrimaryKey();
	}

	public function save($model){
		//INSERT 
	}

	public function update($model){
		//UPDATE
	}

	public function find($value){
		//SELECT * FROM $tableName WHERE primaryKey = $value;
	}

	public function findAll(){
		//SELECT * FROM $tableName
	}

	public function findClause($campo, $value){
		//SELECT * FROM $tableName WHERE $campo = $value
	}
}
