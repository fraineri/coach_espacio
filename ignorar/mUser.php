<?php

class mUser extends Manager{
	
	function __construct($usuario)
	{
		$this->model = $usuario
	}

	public function getByUser(){
		/* TABLE - REGISTRO - VALOR DE BUSQUEDA  */
		$this->db->getBy($this->model->getTable(), 'user', $this->model->user);
	}

	public function getByEmail(){
		/* TABLE - REGISTRO - VALOR DE BUSQUEDA  */
		$this->db->getBy($this->model->getTable(), 'email', $this->model->email);
	}
}