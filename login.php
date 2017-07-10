
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/sign-in-up.css">

	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="js/sign-in-up.js"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coaching | Iniciá sesión</title>
</head>
<body>
	<?php
		session_start();
		
		$usuario= "";
		$errorUsuario= "";
		$errorPass="";
		$valorPass= "";

		//verificar si existe cookie RECORDAME 
		if ((!(isset($_SESSION['erroresPass']) || isset($_SESSION['erroresUsuario'])) && !isset($_SESSION['erroresPass']))  && isset($_COOKIE["usuario"]) && isset($_COOKIE["recordame"])) {
			$usuario= $_COOKIE["usuario"];
			//armo un string de asteriscos q tenga el largo de la contraseña
			$i= 1;
			while ( $i<= $_COOKIE["recordame"]) {
				$valorPass= $valorPass.'*';
				$i++;
			}
		} else {
			//verificar usuario y contraseña 
			if(isset($_SESSION['erroresUsuario'])){
				$usuario= $_SESSION['usuario'];
				$errorUsuario= $_SESSION['erroresUsuario'];
			}
			if(isset($_SESSION['erroresPass'])){
				$usuario= $_SESSION['usuario'];
				$errorPass= $_SESSION['erroresPass'];
			}
		}
		session_destroy();

		$activePage = 'login.php'; 
		$userLogin = isset($_SESSION['nombre'])?$_SESSION['nombre']:null;
		if ($userLogin) {
			header('location: index.php');
		}
		//include('php/header.include.php');
	?>

	<div class="form-container">
		<div class="form-login-container">
			<div class="form-login-shadow"></div>
			<div class="form-login-titleCont">
				<h1 class="form-login-title">INGRESAR</h1>
				<a class="form-login-icon" href="register.php"><i class="fa fa-user-o fa-5x" aria-hidden="true"></i></a>
			</div>
			<form action="php/controllers/login.controller.php" method="post" class="form-login-inputs">
				<input required class="form-login-txtUsuario" type="text" id="ingreso" name="usuario"  placeholder="Usuario"	value=<?php echo $usuario;?>>
				<span class="lbl-error"> <?php echo $errorUsuario;?>
				</span>
		
				<input required class="form-login-txtPass" type="password" id="contraseña" name="password" placeholder="Contraseña" value=<?php echo $valorPass;?>>
				<span class="lbl-error"> <?php echo $errorPass;?>
				</span>
				
				<div class="form-login-remember">
					<label class="form-login-lblRemember">Recordame!</label>
					<input class="form-login-chkRemember" type="checkbox" name="recordame" value="si">
				</div>

				<button class="form-button-login standard-button button-cyan" type="submit">ENTRAR</button>
			</form>
			<a class="form-login-forgot" href="recuperar-contrasenia.php">Olvidaste tu contraseña?</a>
						
			</div>
		</div>
	</div>
</body>
</html>
