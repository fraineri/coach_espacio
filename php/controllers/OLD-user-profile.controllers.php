<?php 
	include 'common.php';
	session_start();

	$errores = [];
	$errores = validarDatos();

	if(count($errores)){
		$_SESSION['errores']  = $errores;
		
		header('Location: ../../user-profile.php');
		exit();
	}
	
	$path = dirname(__FILE__).'/../users';
	updateUser($path);
	//header('location: ../../index.php');
	header('location: ../../user-profile.php');
    exit;
?>