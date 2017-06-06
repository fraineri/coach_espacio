<?php

abstract class Manager{
	protected $db;
	protected $model;

	public function save($model){
		$this->db->save($model);
	}
	public function update($model){
		$this->db->update($model);
	}
	public function find($value){
		return $this->db->find($value);
	}
	public function findClause($campo, $value){
		return $this->db->findClause($campo, $value);
	}
	public function findAll(){
		return $this->db->findAll();
	}

}