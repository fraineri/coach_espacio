<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/recuperar.css">

	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coaching | Recuperar</title>
</head>
<body>
	<?php
		session_start();
		if(isset($_SESSION['errores'])){ 
			$errores['usuario']	= isset($_SESSION['errores']['usuario'])?$_SESSION['errores']['usuario']:"";
			session_destroy();
		}else{
			$errores['usuario'] = "";
		}
		
		$activePage = 'recuperar.php'; 
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
				<span> <?php echo $errores['usuario'];?>
				</span>
				<button class="form-button-recuperar standard-button button-cyan" type="submit">Enviar Mail</button>
			</form>
			</div>
		</div>
	</div>
</body>
</html>