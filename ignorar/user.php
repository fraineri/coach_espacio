<?php

class User extends Model{
	protected $id;
	protected $tableName  = "usuarios"
	protected $primaryKey = "usuario"

	public $usuario;
	public $nombre;
	public $apellido;
	public $email;
	public $password;

	function __construct(arguments){
		/* Setear valores */
		$this->setUsuario();
		$this->setUsuario();
		$this->setUsuario();
		$this->setUsuario();
	}

	public function setUsuario($usuario){};
	public function setNombre($nombre){};
	public function setApellido($apellido){};
	public function setEmail($email){};
	public function setPassword($password){};

	public function getTable(){return $this->$tableName;}
	public function getKey(){return $this->$primaryKey;}


}

?>