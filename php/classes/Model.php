<?php 

abstract class Model{
	private $db;

	public function __construct($db){
		$this->db = $db;
	}

	public function find($value){
		$this->db->find($value,$this);
	}


	public function findAll(){
		$this->db->findAll($this);
	}


	public function save(){
		$this->db->save($this);
	}

	public function getDb(){
		return $this->db;
	}

	abstract public function toModel($data);
	abstract public function getPrimaryValue();
}
