<?php 

require_once 'Validator.php';
class ValidatorLogin extends Validator{
	//Esta funcion la hizo maxi, hay que corregirla
	public function validarDatos(){
		$errores = [];
		if (!$usuario = $usuario->find($datos['email'])) {
			$errores[] = 'El password o el mail ingresado no es correcto.';
		}
		var_dump($usuario);
		if (!password_verify($usuario->password, $datos['password'])) {
		    $errores[] = 'El password o el mail ingresado no es correcto.';
		}
		return $errores;
	}
}
