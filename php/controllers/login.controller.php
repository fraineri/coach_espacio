<?php

session_start();
include 'common.php';

 	function validarDatosLogin(){
        $errores= '';

      
        $usuario= trim($_POST['usuario']);
        if ($usuario=="") {
            $errores="Faltó ingresar un Usuario";
        }
        
        return $errores;
    }


    $errores= validarDatosLogin();
    if($errores){
		$_SESSION['erroresUsuario']= $errores;
		header('Location: ../../login.php');
		exit();
	}


	$path= dirname(__FILE__).'\..\users';
	$user= usernameExists($path);
	/*var_dump($user['password']); echo "<br>";
	var_dump($_POST['password']);
	exit();*/
	
	if($user== false){
		$_SESSION['erroresUsuario'] = "El usuario es inexistente";
		header('location: ../../login.php');
	} 
	//exit();

	
	if(password_verify($_POST['password'],$user['password'])) {

		
		$_SESSION['usuario'] = $_POST['usuario'];
		$_SESSION['nombre'] = $_POST['nombre'];
		$_SESSION['apellido'] = $_POST['apellido'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['picture'] = $pictureName;
		
		header('location: ../../index.php');

	} else{
		$usuario= $_POST['usuario'];
		$_SESSION['usuario'] = $_POST['usuario'];
		$_SESSION['erroresPass'] = "Contraseña incorrecta";
		header('location: ../../login.php');
	}
	

	





?>
