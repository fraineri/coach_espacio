<?php

class mUser extends Manager{
	
	private $user;

	function __construct($user,$db){
		$this->user = $user;
		$this->db = $db;
		$this->model = $user;
	}

	public function getByEmail(){
		$this->db->findClause("name", $value);
	}
	public function getByNombre(){
		$this->db->findClause("name", $value);
	}
}
