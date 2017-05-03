<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/contact.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coaching | Contactanos</title>
</head>
<body>
		<?php
			session_start();
			$activePage = 'contact.php'; 
			$userLogin = isset($_SESSION['nombre'])?$_SESSION['nombre']:null;
			include('php/header.include.php');
		?>

		<div class ="contact-ppal">
			<div class ="contact-ppal-image">
				<p class ="contact-ppal-text">Contactanos_</p>
			</div>

			<div class ="contact-ppal-description">
				<h2>¿Tenés alguna duda? ¿Estás interesado en contratar nuestros servicios?</h2>
				<p>Completá el siguiente formulario para enviarnos un mail!</p>
			</div>
		</div>

		<div class ="form-container">
			<div class="form-contact-container">
				<h1 class="form-title">Contacto</h1>
				<form class="form-contact">
					<input class="form-contact-txtNombre" type="text" id="nombre" name="Nombre" placeholder="Nombre" required>
				
					<input class="form-contact-txtApellido" type="text" id="apellido" name="Apellido" placeholder="Apellido" required>
				
					<input class="form-contact-txtEmail" for="email" type="email" id="email" name="Email" placeholder="hola@ejemplo.com" required>
				
					<textarea class="form-contact-txtMensaje" name="mensaje" id="mensaje" placeholder="Escriba su mensaje" required></textarea>

					<button class="form-button-contact standard-button button-cyan" type="submit">Enviar mensaje</button>

				</form>
			</div>
		</div>

		<?php include('php/footer.include.php') ?>
</body>
</html>