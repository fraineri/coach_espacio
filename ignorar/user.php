<?php

class User extends Model{
	public $usuario;
	public $nombre;
	public $apellido;
	public $email;
	public $password;
	public $avatar;

	function __construct(arguments){
		/* Setear valores */
		$this->setUsuario();
		$this->setNombre();
		$this->setApellido();
		$this->setEmail();
		$this->setPassword();
	}

	public function setUsuario($usuario){};
	public function setNombre($nombre){};
	public function setApellido($apellido){};
	public function setEmail($email){};
	public function setPassword($password){};



}

?>