<?php 

require_once 'Validator.php';
class ValidatorLogin extends Validator{
	//Esta funcion la hizo maxi, hay que corregirla
	public function __construct($user){
		$this->user = $user;
	}

	public function validarDatos(){
		$errores = [];
		if (!$this->user = $this->user->find($datos['usuario'])) {
			$errores[] = 'El password o el usuario ingresado no es correcto.';
		}
		var_dump($this->user);
		if (!password_verify($this->user->password, $datos['password'])) {
		    $errores[] = 'El password o el usuario ingresado no es correcto.';
		}
		return $errores;
	}
}
