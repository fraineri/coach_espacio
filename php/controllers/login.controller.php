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
	$user= usernameExists($path);
	var_dump($user);
	exit();
	if($user== false){
		$_SESSION['errores'] = "El usuario es inexistente";
		header('location: ../../login.php');
	} 
	exit();
	//var_dump($user);
	//if(password_verify($_POST['password'],$user))


	/*var_dump($errores);*/

	?>
