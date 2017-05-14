<?php
	session_start();
	include 'common.php';
	$errores = [];
	$errores = validarDatos();
	if(count($errores)){
		$_SESSION['errores'] = $errores;
		header('Location: ../../recuperar-contrasenia.php');
		exit();
	}

	if(usernameExists('../users')){
		$users = getUsers('../users');
		foreach ($users as $values) {
			if($_POST['usuario'] == $values['usuario']){
				
				$recuperar['usuario'] = $values['usuario'];
				$recuperar['email'] = $values['email'];
				$recuperar['hash'] = md5(uniqid(rand()));
				$_SESSION['recuperar'] = $recuperar;

				$recuperarArr = getUsersRecuperar('../users');
				saveRecuperar('../users');

				header('Location: ../enviar-mail.php');
			}
		}

	}else{
		$errores['usuario'] = "Usuario no encontrado";
		$_SESSION['errores']  = $errores;
		header('Location: ../../recuperar-contrasenia.php');
		exit();
	}

