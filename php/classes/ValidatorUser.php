<?php
class ValidatorUser extends Valitador{
	private $errores;
	function __construct($user){
		$this->errores = [];
		$this->user = $user;
	}

	public function validarUsuario(){
		$this->errores[] = $this->validarNombre($usuario->nombre);
		$this->errores[] = $this->validarApellido($usuario->apellido);
		$this->errores[] = $this->validarEmail($usuario->email);
		$this->errores[] = $this->validarUsuario($usuario->username);
		return $this->errores;
	}
}