<?php

session_start();
include 'common.php';

 	function validarDatosLogin(){
        $errores=[];

      
        $usuario= trim($_POST['Ingreso']);
        if ($usuario=="") {
            $errores[]="Faltó ingresar un Usuario";
        }
        
        return $errores;
    }


    $errores= validarDatosLogin();
    if(count($errores)){
		$_SESSION['errores']= $errores;
		header('Location: ../login.php');
		exit();
	}


	$path= dirname(__FILE__).'\..\users';
	if(!usernameExists($path)){
		$_SESSION['errores'] = "El usuario es inexistente";
		header('location: ../../login.php');
	} else {
		header('location: ../../index.php');
	}


	/*var_dump($errores);*/

	?>
