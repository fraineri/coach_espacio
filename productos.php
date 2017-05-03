<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/productos.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 
	<title>Coaching | productos</title>
</head>
<body>
	<?php
		session_start();
		$activePage = 'productos.php'; 
		$userLogin = isset($_SESSION['nombre'])?$_SESSION['nombre']:null;
		include('php/header.include.php');
	?>
		
	<!-- 8 productos en un container-->
	<div class="containerProductos">
		<div class ="page-title">
				<h1>Productos</h1>
		</div>

		<div class="budas">
			<img src="imagenes/budas.jpg" alt="budas">
		</div>
		<div class="papelera">
			<img src="imagenes/papelera.jpg" alt="papelera">
		</div>
		<div class="papeleraVertical">
			<img src="../imagenes/papeleraVertical.jpg" alt="papelera vertical">
		</div>
		<div class="colgante">
			<img src="../imagenes/guardadorColgante.jpg" alt="estantes colgantes">
		</div>
		<div class="revistero">
			<img src="../imagenes/revistero.jpg" alt="revistero">
		</div>
		<div class="organizadores">
			<img src="../imagenes/organizadoresX3.jpg" alt="organizadores">
		</div>
		<div class="cajaLunares">
			<img src="../imagenes/cajaLunares.jpg" alt="caja a lunares">
		</div>
		<div class="bolsa">
			<img src="../imagenes/bolsaVacio.jpg" alt="bolsa al vacio">
		</div>
	</div>

	<?php include('php/footer.include.php') ?>

</body>
</html>