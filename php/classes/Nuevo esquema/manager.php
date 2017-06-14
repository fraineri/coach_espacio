<?php

abstract class Manager{
	protected $db;
	protected $model;

	public function save(){
		$this->db->save($model);
	}
	public function update(){
		$this->db->update($model);
	}
	public function find($value){
		return $this->db->find($value);
	}
	public function findAll(){
		return $this->db->findAll();
	}
	public function findClause($campo, $value){
		return $this->db->findClause($campo, $value);
	}
}
