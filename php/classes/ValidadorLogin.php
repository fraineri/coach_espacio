<?php
require_once("validador.php");
require_once("repositorio.php");

class ValidadorLogin extends Validador {
	
	public function Validar(Array $datos, Repositorio $repo) {

		$repoUsuarios = $repo->getRepositorioUsuarios();
		$usuario;
		$errores = [];

	 	if (empty($this->sanitizarDatos($datos['usuario']))){
            $errores["usuario"] = "Por favor ingrese el usuario";
        }

        if (empty($this->sanitizarDatos($datos["password"]))){
            $errores["password"] = "Por favor ingrese la contraseña";
        }

        
        if (!($usuario = $repoUsuarios->getUser($datos["usuario"]) ) ){
            $errores["usuario"] = "El usuario no existe";
        }

        if(!$errores) {
            if (!password_verify($datos["password"], $usuario->getPassword())) {
                $errores["password"] ="La contraseña es incorrecta";
            }
        }

        return $errores;
	}
}