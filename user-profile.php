<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/user-profile.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" type="text/css" href="css/register.css">

		<link rel="stylesheet" type="text/css" media="only screen and (min-width:481px) and (max-width:750px)" href="css/sign-in-up-750.css">
		<link rel="stylesheet" type="text/css" media="only screen and (max-width:480px)" href="css/sign-in-up-480.css">


		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

		<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 

		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Información de perfil</title>
	</head>
	<body>
		<?php
			$activePage = 'index.php'; 
			$userLogin = 'Lucia';
				/*$userLogin = isset($_SESSION['username'])?$_SESSION['username']:null
				*/
			include('php/header.include.php');
		?>
		<h2 class ="page-title">Información de perfil</h2>

		<div class = "form-profile-container">
			<h1 class="form-profile-title">USERNAME</h1>
			<form class="form-profile-inputs">
				<label for ="usuario">Usuario</label>
				<input class="form-profile-txtUsuario" type="text" name="usuario">

				<label for ="email">Mail</label>
				<input class="form-profile-txtEmail" type="email" name="email">

				<label for ="nombre">Nombre</label>
				<input class="form-profile-txtNombre" type="text" name="nombre">
			
				<label for ="apellido">Apellido</label>
				<input class="form-profile-txtApellido" type="text" name="apellido">		

				<a class ="standard-button button-red" href="#">Cambiar contraseña</a>

				<button class="form-profile-send standard-button button-cyan" type="submit">ACTUALIZAR DATOS</button>

			</form>
		</div>


		<?php include('php/footer.include.php') ?>
	</body>
</html>