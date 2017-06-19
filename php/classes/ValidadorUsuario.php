<?php
require_once("validador.php");
require_once("repositorio.php");

class ValidadorUsuario extends Validador {
	public function validar(Array $datos, Repositorio $repo) {

		$repoUsuarios = $repo->getRepositorioUsuarios();

		$errores = [];
		$error;
		if ( (isset($datos['nombre'])) && ($error = $this->validarNombre($datos['nombre']) ) ) {
			$errores['nombre'] = $error;
		}

		if ( (isset($datos['apellido'])) && ($error = $this->validarApellido($datos['apellido'])) ) {
			$errores['apellido'] = $error;
		}

		if ( (isset($datos['email'])) && ($error = $this->validarEmail($datos['email'])) ) {
			$errores['email'] = $error;
		}

		if ( (isset($datos['usuario'])) && ($error = $this->validarUsername($datos['usuario'],$repoUsuarios)) ) {
			$errores['usuario'] = $error;
		}

		if ( (isset($datos['password'])) && ($error = $this->validarPassword($datos['password'])) ) {
			$errores['password'] = $error;
		}

        if ( (isset($datos['password2'])) && ($error = $this->validarRePassword($datos['password'], $datos['password2'])) ) {
			$errores['password2'] = $error;
		}

		
		if ($datos['actPsw']) {
			if ($error = $this->checkUserPassword($_SESSION['usuario'],$datos['actPsw'],$repoUsuarios)) {

				$errores['actPsw'] = $error;
			} else if($error = $this->validarPassword($datos['newPsw']) ) {
				$errores['newPsw'] = $error;
			} else if ($error = $this->validarRePassword($datos['newPsw'], $datos['reNewPsw'])){
				$errores['newPsw'] = $error;
			}
		}
		
        return $errores;
	}

	public function checkUserPassword($username,$contra,$repo){
		$error = "";
		$user = $repo->getUser($username);

		if(!password_verify($contra,$user->getPassword()) ) {
			$error = "La contraseña es incorrecta";
		}
		return $error;
	}

	public function validarUsername($dato,$repo){
		$error = "";
		$usuario = $this->sanitizarDatos($dato);
		if ($repo->getUser($usuario) != NULL) {
        	$error="El usuario ingresado ya está registrado.";
        }else if($usuario == ""){ 
	        $error = "Ingrese un usuario.";
	    }else if(strlen($usuario) > 20){ 
	        $error = "El usuario no puede superar los 20 caracteres.";
		}else if(strlen($usuario) < 6){ 
        	$error = "El usuario debe tener un mínimo de 6 caracteres.";
        }

        return $error;
	}

	public function validarNombre($dato){
		$error = "";
	    $nombre = $this->sanitizarDatos($dato);
	    
	    if($nombre == ""){
	    	$error = "Falta nombre.";
	    }else if(strlen($nombre) > 30){
	    	$error = "El nombre no puede contener mas de 30 caracteres.";
	    }else if(!ctype_alpha($nombre)){
	    	$error = "Nombre inválido.";
	    }
		
		return $error;
	}

	public function validarApellido($dato){
		$error = "";
        $apellido = $this->sanitizarDatos($dato);

        if($apellido == ""){
        	$error = "Falta ingresar el apellido.";
        }else if(!ctype_alpha($apellido)){
        	$error = "Apellido invalido.";
        }

		return $error;
	}

	public function validarEmail($dato){
		$error = "";
        $email = $this->sanitizarDatos($dato);
        if($email == ""){
        	$error = "Falta ingresar el email.";
        }else if(strlen($email) > 70){
        	$error = "El email no puede superar los 70 caracteres.";
        }else if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        	$error = "Email invalido";
        }
	
	    return $error;
	}

	public function validarPassword($dato){
		$error ="";
		$password = $dato;

        if($password == ""){ 
        	$error = "Falta contraseña.";
        }else if(strlen($password) > 30){ 
        	$error = "contraseña mayor a 30 caracteres.";
        }else if(strlen($password) < 8){ 
        	$error = "contraseña menor a 8 caracteres.";
        }

        return $error;
	}

	public function validarRePassword($contra, $dato){
		$error ="";
		$password2 = $dato;
	
		if($password2 == ""){ 
			$error = "Debe reingresar la contraseña.";
		}else if($password2 != $contra){ 
			$error = "Las contraseñas no coinciden.";
		}
		return $error;
	}

}
