<?php
	require_once("Repositorio.php");
	
	abstract class Validador {
		abstract public function validar(Array $datos, Repositorio $repo);

	    public function sanitizarDatos($dato){
			$dato = trim($dato);
	        $dato = stripslashes($dato);
	        $dato = htmlspecialchars($dato);
	        return $dato;
		}
	}
