<?php

class dbJSON extends DataBase{
	private $path;

	function __construct ($path){
		$this->$path = $path;
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
		//FIND
	}
	public function findAll(){
		//FIND ALL
	}
	public function findClause($campu, $value){
		//FIND WHERE (?)
	}