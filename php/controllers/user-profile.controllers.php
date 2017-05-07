<?php 
	include 'common.php';
	session_start();
	#$errores = validarDatos();
	/*if (count($errores)) {
		$_SESSION['errores'] = $errores;
		header('location: user-profile.php');
		exit;
	}*/

	$errores = [];
	$errores = validarDatos();

	/*si hay errores de validacion, se redirige al register.php para pedirlos*/
	if(count($errores)){
		$_SESSION['errores']  = $errores;
		
		header('Location: ../../user-profile.php');
		exit();
	}
	
	$path = dirname(__FILE__).'/../users';
	updateUser($path);
	header('location: ../../user-profile.php');
    exit;
?>