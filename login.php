<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
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
		session_start();
		if(!isset($_SESSION['erroresUsuario']) ){ 
			$_SESSION['erroresUsuario'] = '';
		}
		if(!isset($_SESSION['erroresPass']) ){ 
			$_SESSION['erroresPass'] = '';
			
		}
		session_destroy();
		$activePage = 'login.php'; 
		$userLogin = isset($_SESSION['nombre'])?$_SESSION['nombre']:null;
		if ($userLogin) {
			header('location: index.php');
		}
		include('php/header.include.php');
	?>
	<div class="form-container">
		<div class="form-login-container">
			<div class="form-login-shadow"></div>
			<div class="form-login-titleCont">
				<h1 class="form-login-title">INGRESAR</h1>
				<a class="form-login-icon" href="register.php"><i class="fa fa-user-o fa-5x" aria-hidden="true"></i></a>
			</div>
			<form action="php/controllers/login.controller.php" method="post" class="form-login-inputs">
				<input class="form-login-txtUsuario" type="text" id="ingreso" name="usuario"  placeholder="Usuario"	value="<?php if(isset($_SESSION['usuario'])){echo $_SESSION['usuario'];}?>" required>
				<span> <?php echo $_SESSION['erroresUsuario'];?>
				</span>
		
				<input class="form-login-txtPass" type="password" id="contraseña" name="password" placeholder="Contraseña" required>
				<span> <?php echo $_SESSION['erroresPass'];?>
				</span>
				
				<div class="form-login-remember">
					<label class="form-login-lblRemember">Recordame!</label>
					<input class="form-login-chkRemember" type="checkbox" name="">
				</div>

				<button class="form-button-login standard-button button-cyan" type="submit">ENTRAR</button>
			</form>
			<a class="form-login-forgot" href="recuperar-contrasenia.php">Olvidaste tu contraseña?</a>
						
			</div>
		</div>
	</div>
</body>
</html>
