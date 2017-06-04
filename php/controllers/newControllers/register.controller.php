<?php  

session_start();
require_once ('../classes/User.php');
require_once ('../classes/Auth.php');
require_once ('../classes/RepoJSON.php');
require_once ('../classes/ValidatorLogin.php');

$include = $_SERVER['DOCUMENT_ROOT'].'/php/coach_espacio/';

$nom = $_POST['nombre'];
$app = $_POST['apellido'];
$email = $_POST['email'];
$username = $_POST['usuario'];
$pass = $_POST['password'];
$pass2 = $_POST['password2'];

$db = new RepoJSON($include.'php/users/usuarios.json');
$user = new User($db,$username);
$user->setAllValues($nom,$ap,$email,$pass,'avatar',$include.'php/users/pictures/');

$validator = new ValidatorRegister($user);
if ($errores = $validator->validarDatos($pass, $pass2)){
	$regDatos = [];
	$regDatos['nombre'] = isset($errores['nombre'])?"":$_POST['nombre'];
	$regDatos['apellido'] = isset($errores['apellido'])?"":$_POST['apellido'];
	$regDatos['email'] = isset($errores['email'])?"":$_POST['email'];
	$regDatos['usuario'] = isset($errores['usuario'])?"":$_POST['usuario'];

	$_SESSION['errores']  = $errores;
	$_SESSION['regDatos'] = $regDatos;
	header('Location: '.$include.'register.php');
	exit;
}

#<-- Datos validos...
if ($user = $user->find()) {
	$errores['usuario'] = "El nombre de usuario ingresado ya existe";
	$_SESSION['errores'] = $errores;
	header('Location: '.$include.'register.php');
	exit;
}

#<-- Usuario valido, guardo el nuevo usuario...
$user->save();
$auth = new Auth($user);

$auth->loguear();
header ('Location: '.$include.'index.php');
exit;