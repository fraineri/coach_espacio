<?php
require_once("Validador.php");
require_once("Repositorio.php");

class ValidadorLogin extends Validador {
	
	public function Validar(Array $datos, Repositorio $repo) {

		$repoUsuarios = $repo->getRepositorioUsuarios();
		$usuario;
		$errores = [];
        echo"HOLA";

        if ((!$this->sanitizarDatos($datos["password"]))){
            $errores["erroresPass"] = "Por favor ingrese la contraseña";
        }

	 	if ((!$this->sanitizarDatos($datos['usuario'])) ) {
            $errores["erroresUsuario"] = "Por favor ingrese el usuario";
        } else if (!($usuario = $repoUsuarios->getUser($datos["usuario"]) ) ){
            $errores["erroresUsuario"] = "El usuario no existe";
        }

        if(!$errores) {
            if (!password_verify($datos["password"], $usuario->getPassword())) {
                $errores["erroresPass"] ="La contraseña es incorrecta";
            }
        }
        return $errores;
	}
}