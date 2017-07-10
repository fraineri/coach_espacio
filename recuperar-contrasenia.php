<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/recuperar.css">

	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coaching | Recuperar</title>
</head>
<body>
	<?php
		session_start();
		if(isset($_SESSION['errores'])){ 
			if(isset($_SESSION['errores']['usuario'])){
				$error = $_SESSION['errores']['usuario'];
			}else if(isset($_SESSION['errores']['mail'])){
				$error = $_SESSION['errores']['mail'];
			}else{
				$error = "";
			}
			session_destroy();
		}else{
			$error = "";
		}
		if(isset($_SESSION['enviado'])){
			$enviado = $_SESSION['enviado'];
			session_destroy();
		}else{
			$enviado = "";
		}
		
		$activePage = 'recuperar-contrasenia.php'; 
		$userLogin = isset($_SESSION['nombre'])?$_SESSION['nombre']:null;
		if ($userLogin) {
			header('location: index.php');
		}
		include('php/header.include.php');
	?>
	<div class="form-container">
		<div class="form-recuperar-container">
			<div class="form-recuperar-shadow"></div>
			<div class="form-recuperar-titleCont">
				<h1 class="form-recuperar-title">Recuperar Contraseña</h1>
				<a class="form-recuperar-icon"><i class="fa fa-question fa-5x" aria-hidden="true"></i></a>
			</div>
			<form action="php/controllers/recuperar.controller.php" method="post" class="form-recuperar-inputs">
				<input class="form-recuperar-txtUsuario" type="text" id="usuario" name="usuario"  placeholder="Usuario"	value="" required>
				<span class="lbl-error"> <?php  echo $error;?></span>
				<span class="lbl-confirm"> <?php echo $enviado;?></span>
				<button class="form-button-recuperar standard-button button-cyan" type="submit">Enviar Mail</button>
			</form>
			</div>
		</div>
	</div>
</body>
</html>