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
		$_SESSION['usuario'] = "";
		include('php/controllers/common.php');
		
		if(!isset($_GET['hash'])){
			header('Location: index.php');
			exit();
		}
		
		$hash = $_GET['hash'];
		$existeHash = false;
		$usuarios = getUsersRecuperar('php/users/');
		
		foreach ($usuarios as $key => $value) {
			if($value['hash'] == $hash){
				$existeHash = true;
				$_SESSION['usuario'] = $value['usuario'];
				break;
			}	
		}
		
		if(!$existeHash){
			header('Location: index.php');
			exit();	
		}

	?>
	<div class="form-container">
		<div class="form-recuperar-container">
			<div class="form-recuperar-shadow"></div>
			<div class="form-recuperar-titleCont">
				<h1 class="form-recuperar-title">Restablecer Contraseña</h1>
				<a class="form-recuperar-icon"><i class="fa fa-question fa-5x" aria-hidden="true"></i></a>
			</div>
			<form action="php/controllers/restablecer.controller.php" method="post" class="form-recuperar-inputs">
				<input class="form-recuperar-txtUsuario" type="password" id="password" name="password"  placeholder="Contraseña"	value="" required>
				<input class="form-recuperar-txtUsuario" type="password" id="password2" name="password2"  placeholder="Repita Contraseña"	value="" required>
				<input type="hidden" name="hash" value=<?php echo $hash; ?>>
				<button class="form-button-recuperar standard-button button-cyan" type="submit">Enviar Mail</button>
			</form>
			</div>
		</div>
	</div>
</body>
</html>