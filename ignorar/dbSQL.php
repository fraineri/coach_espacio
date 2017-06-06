<?php

class dbSQL extends DataBase{
	public $pdo;

	function __construct ($table){
		$this->$tableName = $table;
		$this->setPrimaryKey();
	}

	private setPrimaryKey(){
		//
	}
	public function save($model){
		//INSERT 
	}
	public function update($model){
		//UPDATE
	}
	public function find($value){
		//FIND WHERE primaryKey = $value;
	}
	public function findAll(){
		//SELECT ALL
	}
	public function findClause($campu, $value){
		//SELECT MODIFICADO
	}
}