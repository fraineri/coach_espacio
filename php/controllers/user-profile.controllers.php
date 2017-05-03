<?php 
	include 'common.php';
	session_start();
	#$errores = validarDatos();
	/*if (count($errores)) {
		$_SESSION['errores'] = $errores;
		header('location: user-profile.php');
		exit;
	}*/
	
	$path = dirname(__FILE__).'\..\users';
	updateUser($path);
?>