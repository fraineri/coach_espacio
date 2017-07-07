<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">

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
		session_start();
		$activePage = 'register.php'; 
		$userLogin = isset($_SESSION['nombre'])?$_SESSION['nombre']:null;
		if ($userLogin) {
			header('location: index.php');
		}

		if(isset($_SESSION['errores'])){
			$errores['nombre'] 	  = isset($_SESSION['errores']['nombre'])?$_SESSION['errores']['nombre']:"";
			$errores['apellido']  = isset($_SESSION['errores']['apellido'])?$_SESSION['errores']['apellido']:"";
			$errores['email'] 	  = isset($_SESSION['errores']['email'])?$_SESSION['errores']['email']:"";
			$errores['usuario']	  = isset($_SESSION['errores']['usuario'])?$_SESSION['errores']['usuario']:"";
			$errores['password']  = isset($_SESSION['errores']['password'])?$_SESSION['errores']['password']:"";

			$errores['password2'] = (isset($_SESSION['errores']['password2'])&&isset($_SESSION['errores']['password']))?"":$_SESSION['errores']['password2'];

			$regDatos['nombre']    = isset($_SESSION['regDatos']['nombre'])?$_SESSION['regDatos']['nombre']:"";
			$regDatos['apellido']  = isset($_SESSION['regDatos']['apellido'])?$_SESSION['regDatos']['apellido']:"";
			$regDatos['email'] 	   = isset($_SESSION['regDatos']['email'])?$_SESSION['regDatos']['email']:"";
			$regDatos['usuario']   = isset($_SESSION['regDatos']['usuario'])?$_SESSION['regDatos']['usuario']:"";

			session_destroy();

		}else{

			$errores = [];
			$errores['nombre'] 		= "";
			$errores['apellido'] 	= "";
			$errores['email'] 		= "";
			$errores['usuario'] 	= "";
			$errores['password'] 	= "";
			$errores['password2'] 	= "";

			$regDatos['nombre'] 	= "";
			$regDatos['apellido'] 	= "";
			$regDatos['email'] 		= "";
			$regDatos['usuario'] 	= "";


		}
		include('php/header.include.php');
	?>
	<div class="form-container">
		<div class="form-register-container">
			<div class="form-register-shadow"></div>
				<div class="form-register-titleCont">
					<h1 class="form-register-title">REGISTRATE</h1>
					<div class="form-register-icon" ><i class="fa fa-pencil fa-5x" aria-hidden="true"></i></div>
				</div>
				<form class="form-register-inputs" action="php/controllers/register.controller.php" method="post" enctype="multipart/form-data">
					<input id="txtName" class="form-register-txtNombre" type="text" name="nombre" placeholder="Nombre"  value=<?php echo $regDatos['nombre'];?>>
					<span class="lbl-error"><?php echo $errores['nombre'];?></span>

					<input id="txtSurname" class="form-register-txtApellido" type="text" name="apellido" placeholder="Apellido"  value=<?php echo $regDatos['apellido'];?>>		
					<span class="lbl-error"><?php echo $errores['apellido'];?></span>

					<input id="txtEmail" class="form-register-txtEmail" type="text" name="email" placeholder="tu@email"  value=<?php echo $regDatos['email'];?>>
					<span class="lbl-error"><?php echo $errores['email'];?></span>

					<input id="txtUser" class="form-register-txtUsuario" type="text" name="usuario" placeholder="Usuario"  value=<?php echo $regDatos['usuario']; ?>>
					<span id="user-lbl-error" class="lbl-error"><?php echo $errores['usuario'];?></span>
					<span id="user-lbl-ok" class="lbl-ok"></span>
					
					<input id="txtPass" class="form-register-txtPass" type="password" name="password" placeholder="Contraseña" >
					<span class="lbl-error"><?php echo $errores['password'];?></span>

					<input id="txtRePass" class="form-register-txtRePass" type="password" name="password2" placeholder="Repita su contraseña" >
					<span class="lbl-error"><?php echo $errores['password2'];?></span>

					<label for="avatar" class="form-register-label-foto">Foto de perfil</label>
					<input class="form-register-foto" type="file" name="avatar">

					<button class="form-button-register standard-button button-white" type="submit">REGISTRAR</button>
				</form>
			</div>
		</div>
	</div>
</body>
</html>
<script src="js/registerValidation.js"></script>
