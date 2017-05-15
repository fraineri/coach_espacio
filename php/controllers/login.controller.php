<?php
session_start();
include ('common.php');

	$path= dirname(__FILE__).'/../users';
	$user= usernameExists($path);
if (isset($_COOKIE["usuario"]) && ($_COOKIE["passHash"]==$user['password'])) {

		$_SESSION['usuario'] = $user['usuario'];
		$_SESSION['nombre'] = $user['nombre'];
		$_SESSION['apellido'] = $user['apellido'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['picture'] = $user['picture'];
		
	header('location: ../../index.php');
} else {

    $errores= validarDatosLogin();
    if($errores){
		$_SESSION['erroresUsuario']= $errores;
		header('Location: ../../login.php');
		exit();
	}

	//$path= dirname(__FILE__).'/../users';
	//$user= usernameExists($path);
	
	if($user== false){
		$_SESSION['erroresUsuario'] = "El usuario es inexistente";
		header('location: ../../login.php');
		exit;
	} 

	if(password_verify($_POST['password'],$user['password'])) {
		$_SESSION['usuario'] = $user['usuario'];
		$_SESSION['nombre'] = $user['nombre'];
		$_SESSION['apellido'] = $user['apellido'];
		$_SESSION['email'] = $user['email'];
		$_SESSION['picture'] = $user['picture'];
		
		//verificar si quiere ser RECORDADO
		if(isset($_POST['recordame']) && ($_POST['recordame']=="si")) {
				//genero 2 cookies, una con el usuario y otra con el largo de la password
				$expira= time()+ (60*60*24*365);
				setcookie("usuario", $_POST['usuario'], $expira,'/');
				$largoPass=strlen($_POST['password']);
				setcookie("recordame", $largoPass, $expira,'/');
				setcookie("passHash", $user['password'], $expira, '/');
			
		}

		header('location: ../../index.php');

	} else {
		$usuario= $_POST['usuario'];
		$_SESSION['usuario'] = $_POST['usuario'];
		$_SESSION['erroresPass'] = "Contraseña incorrecta";
		header('location: ../../login.php');
		}
}

?>
