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
		foreach ($users as $user => $values) {
			if($_POST['usuario'] == $values['usuario']){
				echo $values['email'];
				$_SESSION['email'] = $values['email'];
				header('Location: ../enviar-mail.php');
			}
		}

	}else{
		$errores['usuario'] = "Usuario no encontrado";
		$_SESSION['errores']  = $errores;
		header('Location: ../../recuperar-contrasenia.php');
		exit();
	}

