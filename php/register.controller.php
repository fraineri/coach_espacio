<?php
/*var_dump($_POST); prueba de que register y controller están enlazados*/
session_start();
include('controllers/common.php');
/*validar los datos del register.php a traves de la funcion validarDatos del common.php*/
$errores= validarDatos();
/*si hay errores de validacion, se redirige al register.php para pedirlos*/
if(count($errores)){
	$_SESSION['errores']= $errores;
	header('Location: ../register.php');
	exit();
}

$path= dirname(__FILE__).'/../images/';
saveUser($path);
if(isset($_POST['avatar'])){
	saveImage($_POST['avatar'],$path);	
}
echo '<h1>'.'Bienvenido'.'</h1>';
?>