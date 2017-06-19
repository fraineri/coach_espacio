<?php 
	require_once ('DatabaseSupport.php');
	require_once("../classes/validadorUsuario.php");
	@session_start();
	$repoUsuarios = $repo->getRepositorioUsuarios();

	$validador = new ValidadorUsuario();
	$errores = [];
	$errores = $validador->validar($_POST, $repo);

	if(count($errores)){
		$_SESSION['errores']  = $errores;
		header('Location: ../../user-profile.php');
		exit;
	}

	
	$user = $repoUsuarios->getUser($_SESSION['usuario']);
	$user->setNombre($_POST['nombre']);
	$user->setApellido($_POST['apellido']);
	$user->setEmail($_POST['email']);
	if ($_POST['newPsw']) {
		$user->setPassword($_POST['newPsw']);
	}
	
	if (($_FILES['avatar']['name'])){
		$user->setAvatar($_FILES['avatar']);
	}

	$repoUsuarios->updateUser($user);
	/*Modifico el session*/
	$auth::loguear($user);

	
	//header('location: ../../index.php');
	header('location: ../../user-profile.php');
    exit;
?>