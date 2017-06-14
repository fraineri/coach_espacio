<?php
class ValidatorRegister extends Validator{
	private $errores;

	function __construct($user){
		$errores = [];
		$this->user = $user;
	}

	public function validarRegistro(){
		
	}

	public function validarPassword($password){
		$this->errores[] = $this->validarPassword($password);
		return $this->errores;
	}
	public function validarRePassword($password, $rePassowrd){
		$this->errores[] = $this->validarRePassword($password, $rePassowrd);
		return $this->errores;
	}
}