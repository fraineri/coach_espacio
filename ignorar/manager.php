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
	public function getId($id){
		return $this->db->getId($id);
	}
	public function getAll(){
		return $this->db->getAll();
	}
}