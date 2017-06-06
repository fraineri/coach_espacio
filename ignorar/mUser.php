<?php

class mUser extends Manager{
	
	function __construct($usuario){
		$this->model = $usuario;
	}

	public function getByEmail(){
		$this->db->findClause("name", $value);
	}
	public function getByNombre(){
		$this->db->findClause("name", $value);
	}
}