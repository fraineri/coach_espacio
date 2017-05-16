<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/user-profile.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">


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
			if (isset($_SESSION['lastActivity']) && (time() - $_SESSION['lastActivity'] > 1800)) {
			    session_unset();
			    session_destroy();
			}
			$_SESSION['lastActivity'] = time();

			$activePage = 'user-profile.php'; 
			$userLogin = isset($_SESSION['nombre'])?$_SESSION['nombre']:null;
			if (!$userLogin) {
				header('location: index.php');
			}
			include('php/header.include.php');
		
			$usuario = isset($_SESSION['usuario']) ? $_SESSION['usuario']:"";
			$email = isset($_SESSION['email']) ? $_SESSION['email']:"";
			$nombre = isset($_SESSION['nombre']) ? $_SESSION['nombre']:"";
			$apellido = isset($_SESSION['apellido']) ? $_SESSION['apellido']:"";

			if(isset($_SESSION['errores'])){
				$errores['nombre'] 	  = isset($_SESSION['errores']['nombre'])?$_SESSION['errores']['nombre']:"";
				$errores['apellido']  = isset($_SESSION['errores']['apellido'])?$_SESSION['errores']['apellido']:"";
				$errores['email'] 	  = isset($_SESSION['errores']['email'])?$_SESSION['errores']['email']:"";
				$errores['usuario']	  = isset($_SESSION['errores']['usuario'])?$_SESSION['errores']['usuario']:"";

				$errores['actPsw']	  = isset($_SESSION['errores']['actPsw'])?$_SESSION['errores']['actPsw']:"";
				$errores['newPsw']	  = isset($_SESSION['errores']['newPsw'])?$_SESSION['errores']['newPsw']:"";
			
				$_SESSION['errores'] = [];
			}else{
				$errores = [];
				$errores['nombre'] 		= "";
				$errores['apellido'] 	= "";
				$errores['email'] 		= "";
				$errores['usuario'] 	= "";
				$errores['actPsw'] 		= "";
				$errores['newPsw'] 		= "";
			}

		?>

		<h2 class ="page-title">Información de perfil</h2>

		<div class = "form-profile-container">
			<h1 class="form-profile-title"><?php echo $nombre.' '.$apellido ?></h1>
			<form class="form-profile-inputs" method="POST" action="php/controllers/user-profile.controllers.php" enctype="multipart/form-data">
				<label class="form-profile-label">Usuario</label>
				<p class="form-profile-txtUsuario"> <?php echo $usuario ?> </p>

				<label class="form-profile-label" for ="email">Mail</label>
				<input class="form-profile-txtEmail" type="email" name="email" value ="<?php echo $email ?>">
				<span class="lbl-error"> <?php echo $errores['email'];?> </span>

				<label class="form-profile-label" for ="nombre">Nombre</label>
				<input class="form-profile-txtNombre" type="text" name="nombre" value ="<?php echo $nombre ?>">
				<span class="lbl-error"> <?php echo $errores['nombre'];?> </span>
			
				<label class="form-profile-label" for ="apellido">Apellido</label>
				<input class="form-profile-txtApellido" type="text" name="apellido" value="<?php echo $apellido ?>">		
				<span class="lbl-error"> <?php echo $errores['apellido'];?> </span>

				<label class="form-profile-label" for ="profile-picture">Foto de perfil</label>
				<?php 
					if ($_SESSION['picture'] != 'default.png') {
						$name = $_SESSION['picture'];
						echo "<img class = 'form-profile-picture' src='php/users/pictures/$name'>";
					}
				?>
				<input type="file" name="avatar">

				<div class ="change-psw">
					<label for ="change-psw">Contraseña</label>	
					<button class="standard-button button-red" type="button" name="but-change-psw">Cambiar contraseña</button>
				</div>

				<label for ="actPsw">Ingrese su contraseña actual</label>
				<input class="form-profile-txtPass" type="password" name="actPsw">
				<span class="lbl-error"> <?php echo $errores['actPsw'];?> </span>	

				<label for ="actPsw">Ingrese su nueva contraseña</label>
				<input class="form-profile-txtPass" type="password" name="newPsw">

				<label for ="actPsw">Reingrese la contraseña nueva</label>
				<input class="form-profile-txtPass" type="password" name="reNewPsw">
				<span class="lbl-error"> <?php echo $errores['newPsw'];?> </span>	
				

				<button class="form-profile-send standard-button button-cyan" type="submit">ACTUALIZAR DATOS</button>

			</form>
		</div>


		<?php include('php/footer.include.php') ?>
	</body>
</html>