<?php 

abstract class Validator{
	private $user
	private $error;

	abstract public function validarDatos();

	public function limpiarDato($dato){
        $dato = trim($dato);
        $dato = stripslashes($dato);
        $dato = htmlspecialchars($dato);

        return $dato;
	}

	public function validarNombre($nombre){
	    $nombre = $this->limpiarDato($nombre);
	    if($nombre == ""){
	    	$this->$error = "Falta nombre.";
	    }
	    if(strlen($nombre) > 30){
	    	$this->$error = "Nombre mayor a 30 caracteres.";
	    }    
	    if(!ctype_alpha($nombre)){
	    	$this->$error = "Nombre invalido.";
	    }
	    return $this->$error;
	}

	public function validarApellido($apellido){
        $apellido = $this->limpiarDato($apellido);
        if($apellido == ""){
        	$this->$error = "Falta apellido.";
        }
        if(strlen($apellido) > 40){
        	$this->$error = "Apellido mayor a 30 caracteres.";
        }
        if(!ctype_alpha($apellido)){
        	$this->$error = "Apellido invalido.";
        }
	    return $this->$error;
	}

	public function validarEmail($email){
        $email = $this->limpiarDato($email);
        if($email == ""){
        	$this->$error = "Falta email.";
        }
        if(strlen($email) > 30){
        	$this->$error = "Email mayor a 30 caracteres.";
        }
        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        	$this->$error = "Email invalido";
        }
	    return $this->$error;
	}

	public function validarUsuario($usuario){
	    $usuario = $this->limpiarDato($usuario);
	    if($usuario == ""){
	    	$this->error = "Falta usuario.";
	    }
	    if(strlen($usuario) > 20){
	    	$this->error = "Usuario mayor a 20 caracteres.";
	    }
	    if(strlen($usuario) < 6){
	    	$this->error = "Usuario menor a 6 caracteres.";
	    }
	    return $this->$error;        
	}

	public function validarPassword($password){
	    $password = $password;
	    if($password == ""){
	    	$this->error = "Falta contraseña.";
	    }
	    if(strlen($password) > 30){
	    	$this->error = "contraseña mayor a 30 caracteres.";
	    }
	    if(strlen($password) < 8){
	    	$this->error = "contraseña menor a 8 caracteres.";
	    }
	    return $this->$error;
	}

	public function validarRePassword($password,$rePassowrd){
        $rePassowrd = $rePassowrd;
        if($rePassowrd == ""){
        	$this->error = "Falta repetir contraseña.";
        }
        if($rePassowrd != $password){
        	$this->error = "Contraseñas distntas.";
        }
		return $this->$error;
	}

}