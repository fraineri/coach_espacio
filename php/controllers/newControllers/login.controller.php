<?php 

session_start();
require_once ('../classes/User.php');
require_once ('../classes/Auth.php');
require_once ('../classes/RepoJSON.php');
require_once ('../classes/ValidatorLogin.php');


$include = $_SERVER['DOCUMENT_ROOT'].'/php/coach_espacio/';
$_POST['username'] = "luu";
$_POST['password'] = "hola";

$db = new RepoJSON($include.'php/users/usuarios.json');
$u = new User($db);
$u-> setUsername($_POST['username']);

$user = $u->find($_POST['username']);
if (!$user){
	$_SESSION['erroresUsuario'] = "El usuario es inexistente";
	header('location: '.$include.'login.php');
	exit;
}

$auth = new Auth($user);
if($auth->checkCookies()){
	$auth->loguear();
	header('location: '.$include.'index.php');
	exit;
}

$validator = new ValidatorLogin($user);

if($erorres = $validator->validarDatos()){
	$_SESSION['erroresUsuario'] = $errores;
	header('Location: '.$include.'login.php');
	exit;
}

if (password_verify($_POST['password'],$user->getPassword())) {
	$auth->loguear();
	if(isset($_POST['recordame']) && ($_POST['recordame']=="si")){
		$auth->saveCookies();
	}
	
	header('location: '.$include.'index.php');
} else{
	$_SESSION['usuario'] = $user->getUsername();
	$_SESSION['erroresPass'] = "Contraseña incorrecta";
	header('Location: '.$include.'login.php');
}

