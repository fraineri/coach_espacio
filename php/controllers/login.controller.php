<?php
require_once ('DatabaseSupport.php');
require_once("../classes/ValidadorLogin.php");
@session_start();

if ($auth->estaLogueado()) {
	header("Location: ../../index.php");
	exit;
}
$errores = [];
if ($auth->checkCookies($_POST['usuario'],$repo)) {
	$user = $repo->getRepositorioUsuarios()->getUser($_POST['usuario']);
	$auth->loguear($user);
	header('Location: ../../index.php');
	exit;
}

$validador = new ValidadorLogin();
$errores = $validador->validar($_POST, $repo);

if(count($errores)){
	$_SESSION['usuario'] = $_POST['usuario'];
	if (isset($errores['erroresUsuario'])) {
		$_SESSION['erroresUsuario'] = $errores['erroresUsuario'];
	}

	if (isset($errores['erroresPass'])) {
		$_SESSION['erroresPass'] = $errores['erroresPass'];
	}
	header('Location: ../../login.php');
	exit();
}

/*Formularion sin errores, usuario correcto*/
$usuario = $repo->getRepositorioUsuarios()->getUser($_POST["usuario"]);
$auth->loguear($usuario);

if (isset($_POST["recordame"]) ){
	$auth->guardarCookie($usuario,strlen($_POST['password']));
}

header('location: ../../index.php');
exit;


?>
