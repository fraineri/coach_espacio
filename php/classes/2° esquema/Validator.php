<?php
class Validator{
	private $datos;
	private $errores;
	
	function __construct(){
		$this->$datos 	= $_POST;
		$this->$errores = [];
	}

	private function sanitizarDatos($dato){
		$dato = trim($dato);
        $dato = stripslashes($dato);
        $dato = htmlspecialchars($dato);
        return $dato;
	}

	public function validarNombre(){
		$error = "";
		if(isset($this->datos['nombre'])){
		    $nombre = $this->limpiarDato($this->datos['nombre']);
		    if($nombre == ""){
		    	$error = "Falta nombre.";
		    }
		    if(strlen($nombre) > 30){
		    	$error = "Nombre mayor a 30 caracteres.";
		    }    
		    if(!ctype_alpha($nombre)){
		    	$error = "Nombre invalido.";
		    }
		}
		return $error;
	}

	public function validarApellido(){
		$error = "";
		if(isset($this->datos['apellido'])){
	        $apellido = $this->limpiarDato($this->['apellido']);
	        if($apellido == ""){
	        	$error = "Falta apellido.";
	        }
	        if(strlen($apellido) > 40){
	        	$error = "Apellido mayor a 30 caracteres.";
	        }
	        if(!ctype_alpha($apellido)){
	        	$error = "Apellido invalido.";
	        }
		}
		return $error;
	}

	public function validarEmail($email){
		$error = "";
		if(isset($this->datos['email'])){
	        $email = $this->limpiarDato($this->datos['email']);
	        if($email == ""){
	        	$error = "Falta email.";
	        }
	        if(strlen($email) > 30){
	        	$error = "Email mayor a 30 caracteres.";
	        }
	        if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
	        	$error = "Email invalido";
	        }
		}
	    return $error;
	}


}