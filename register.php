<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" media="only screen and (min-width:481px) and (max-width:750px)" href="css/sign-in-up-750.css">
	<link rel="stylesheet" type="text/css" media="only screen and (max-width:480px)" href="css/sign-in-up-480.css">

	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="js/sign-in-up.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coaching | Iniciá sesión</title>
</head>
<body>
	<?php
		$activePage = 'sign-in-up.php'; 
		$userLogin = null;
			/*$userLogin = isset($_SESSION['username'])?$_SESSION['username']:null
			*/
		include('php/header.include.php');
	?>
	<div class="form-container">
		<div class="form-register-container">
			<div class="form-register-shadow"></div>
				<div class="form-register-titleCont">
					<h1 class="form-register-title">REGISTRATE</h1>
					<div class="form-register-icon" ><i class="fa fa-pencil fa-5x" aria-hidden="true"></i></div>
				</div>
				<form class="form-register-inputs">
					<input class="form-register-txtNombre" type="text" name="nombre" placeholder="Nombre" required>
				
					<input class="form-register-txtApellido" type="text" name="apellido" placeholder="Apellido" required>		

					<input class="form-register-txtEmail" type="email" name="email" placeholder="tu@email" required>

					<input class="form-register-txtUsuario" type="text" name="usuario" placeholder="Usuario" required>
					
					<input class="form-register-txtPass" type="password" name="contrasenia" placeholder="Contraseña" required>

					<input class="form-register-txtRePass" type="password" name="recontrasenia" placeholder="Repita su contraseña" required>

					<button class="form-button-register standard-button button-white" type="submit">REGISTRAR</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
