<?php
	
	require_once ('DatabaseSupport.php');
	require_once("../classes/validadorUsuario.php");
	@session_start();

	$repoUsuarios = $repo->getRepositorioUsuarios();
    if ($auth->estaLogueado()) {
        header("Location: ../../index.php");
        exit;
    }

    $validador = new ValidadorUsuario();
	$errores = [];
	
	$errores = $validador->validar($_POST, $repo);
	if(count($errores)){
		//Mantengo los datos que no tienen errores.
		$regDatos = [];
		$regDatos['nombre'] = isset($errores['nombre'])?"":$_POST['nombre'];
		$regDatos['apellido'] = isset($errores['apellido'])?"":$_POST['apellido'];
		$regDatos['email'] = isset($errores['email'])?"":$_POST['email'];
		$regDatos['usuario'] = isset($errores['usuario'])?"":$_POST['usuario'];

		$_SESSION['errores']  = $errores;
		$_SESSION['regDatos'] = $regDatos;
		
		header('Location: ../../register.php');
		exit();
	}

	/*No hay errores, agrego al usuario*/
	$usuario = new User($_POST["usuario"]);
    $usuario->setAllValues(
        $_POST['nombre'],
        $_POST['apellido'],
        $_POST['email'],
        $_POST['password'],
        $_FILES['avatar']
    );
    
    $usuario->save($repoUsuarios);
    $auth->loguear($usuario);
	header('Location: ../../index.php');
	exit();
?>
