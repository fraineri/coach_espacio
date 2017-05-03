<?php
	/*var_dump($_POST); prueba de que register y controller están enlazados*/
	session_start();
	include('common.php');

	/*validar los datos del register.php a traves de la funcion validarDatos del common.php*/
	$errores= validarDatos();
	/*si hay errores de validacion, se redirige al register.php para pedirlos*/
	if(count($errores)){
		$_SESSION['errores']= $errores;
		header('Location: ../register.php');
		exit();
	}

	$path= dirname(__FILE__).'\..\users';
	if(!usernameExists($path)){
		$pictureName = 'default.png';
		if(isset($_FILES['avatar'])){
			if(saveImage('avatar',$path."\pictures/",$_POST['usuario']) == null ){
				//se subio la imagen sin errores
				$pictureName= $_POST['usuario'].'.'.pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
			}
		}

		saveUser($path,$pictureName);

		/*Inicio de sesión exitosa*/
		$_SESSION['usuario'] = $_POST['usuario'];
		$_SESSION['nombre'] = $_POST['nombre'];
		$_SESSION['apellido'] = $_POST['apellido'];
		$_SESSION['email'] = $_POST['email'];
		$_SESSION['picture'] = $pictureName;

		header('location: ../../index.php');
	}else{
		echo "El nombre de usuario ingresado ya existe";
		$errores[] = "El nombre de usuario ingresado ya existe";
	}
?>