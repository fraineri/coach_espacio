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
			session_start();
			$activePage = 'user-profile.php'; 
			$userLogin = isset($_SESSION['nombre'])?$_SESSION['nombre']:null;
			if (!$userLogin) {
				header('location: index.php');
			}
			include('php/header.include.php');
		?>

		<?php  
			$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario']:"";
			$email = isset($_SESSION['email']) ? $_SESSION['email']:"";
			$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre']:"";
			$apellido = isset($_SESSION['apellido']) ? $_SESSION['apellido']:"";
		?>

		<h2 class ="page-title">Información de perfil</h2>

		<div class = "form-profile-container">
			<h1 class="form-profile-title"><?php echo $nombre.' '.$apellido ?></h1>
			<form class="form-profile-inputs" method="POST" action="php/controllers/user-profile.controllers.php" enctype="multipart/form-data">
				<label>Usuario</label>
				<p class="form-profile-txtUsuario"> <?php echo $usuario ?> </p>

				<label for ="email">Mail</label>
				<input class="form-profile-txtEmail" type="email" name="email" value ="<?php echo $email ?>">

				<label for ="nombre">Nombre</label>
				<input class="form-profile-txtNombre" type="text" name="nombre" value ="<?php echo $nombre ?>">
			
				<label for ="apellido">Apellido</label>
				<input class="form-profile-txtApellido" type="text" name="apellido" value="<?php echo $apellido ?>">		

				<label for ="profile-picture">Foto de perfil</label>
				<?php 
					if ($_SESSION['picture'] != 'default.png') {
						$name = $_SESSION['picture'];
						echo "<img class = 'form-profile-picture' src='php/users/pictures/$name'>";
					}
				?>

				<input type="file" name="avatar">

				<a class ="standard-button button-red" href="#">Cambiar contraseña</a>

				<button class="form-profile-send standard-button button-cyan" type="submit">ACTUALIZAR DATOS</button>

			</form>
		</div>


		<?php include('php/footer.include.php') ?>
	</body>
</html>