<?php 
	include 'common.php';
	session_start();
	echo "<pre>";
	var_dump($_POST);
	echo "</pre>";

	$errores = [];
	$errores = validarDatos();

	if(count($errores)){
		$_SESSION['errores']  = $errores;
		
		header('Location: ../../restablecer-contrasenia.php?hash='.$_POST['hash']);
		exit();
	}

	$path = dirname(__FILE__).'/../users';
	updatePass($path);
	//header('location: ../../index.php');
	header('location: ../../index.php');
    exit;
?>