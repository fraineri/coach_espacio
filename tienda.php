<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/tienda.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<title>Coaching | productos</title>
</head>
<body>
	<?php
		session_start();
		$activePage = 'tienda.php'; 
		$userLogin = isset($_SESSION['nombre'])?$_SESSION['nombre']:null;
		include('php/header.include.php');
	?>

	<div class ="container">
		<h1>Bienvenido a la tienda!</h1>
		<div class ="items-container">
			<div>
				<a class ="item" href="productos.php">
					<img class ="item-image" src="/php/coach_espacio/images/others/relojes.jpg">
					<p class ="item-title">Artículos</p>	
				</a>
			</div>
			<div>
				<a class ="item" href="">
					<img class ="item-image" src="/php/coach_espacio/images/others/Curso.jpg">
					<p class ="item-title">Cursos</p>
				</a>
			</div>
		</div>
	</div>


	<?php include('php/footer.include.php') ?>

</body>
</html>