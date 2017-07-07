<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/productos.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<title>Coaching | productos</title>
</head>
<body>
	<?php
		session_start();
		$activePage = 'productos.php'; 
		$userLogin = isset($_SESSION['nombre'])?$_SESSION['nombre']:null;
		include('php/header.include.php');
	?>
	<div>
		<div class = "banner">
			
		</div>
	</div>

	<div class ="products-container">
		<a href="" id ="test" class = "product-item">
			<div class ="product-image">
				<img class="product-image-resize" src="/php/coach_espacio/images/products/5725-810-fanal-believe1.jpg">
			</div>

			<!-- if no stock o descuento -->
			<div class ="product-special"></div>

			<div class ="product-title"><p>Fanal believe</p></div>
			<div class ="info-container" >
				<div class ="product-price"><p>$575.00</p></div>
				<div class ="product-option">+ VER MÁS</div>
			</div>
		</a>

		<a href="" class = "product-item">
			<div class ="product-image">
				<img class="product-image-resize" src="/php/coach_espacio/images/products/5608-339-mudo-0022-zen-crudo4.jpg">
			</div>

			<!-- if no stock o descuento -->
			<div class ="product-special">
				<img src="/php/coach_espacio/images/products/noStock.png">
			</div>

			<div class ="product-title"><p>Maceta guerrero Zen Crudo</p></div>
			<div class ="product-price"><p>$420.00</p></div>
			<div class ="product-option"></div>
		</a>
		<a href="" class = "product-item">
			<div class ="product-image">
				<img class="product-image-resize" src="/php/coach_espacio/images/products/5623-386-kiki-0032-layer-51.jpg">
			</div>

			<!-- if no stock o descuento -->
			<div class ="product-special">
				
			</div>

			<div class ="product-title"><p>Torre Eifel de metal de 25cm</p></div>
			<div class ="product-price"><p>$420.00</p></div>
			<div class ="product-option"></div>
		</a>
		<a href="" class = "product-item">
			<div class ="product-image">
				<img class="product-image-resize" src="/php/coach_espacio/images/products/5634-784-kiki-0018-35044477.jpg">
			</div>

			<!-- if no stock o descuento -->
			<div class ="product-special"></div>

			<div class ="product-title"><p>Reloj auto flip</p></div>
			<div class ="product-price"><p>$468.00</p></div>
			<div class ="product-option"></div>
		</a>
		<a href="" class = "product-item">
			<div class ="product-image">
				<img class="product-image-resize" src="/php/coach_espacio/images/products/5670-750-animales-0024-unicorn1.jpg">
			</div>

			<!-- if no stock o descuento -->
			<div class ="product-special"></div>

			<div class ="product-title"><p>Lámpara de madera unicornio</p></div>
			<div class ="product-price"><p>$1490.00</p></div>
			<div class ="product-option"></div>
		</a>
		<a href="" class = "product-item">
			<div class ="product-image">
				<img class="product-image-resize" src="/php/coach_espacio/images/products/5678-845-1.jpg">
			</div>

			<!-- if no stock o descuento -->
			<div class ="product-special"></div>

			<div class ="product-title"><p>Portaretratos anteojos negro</p></div>
			<div class ="product-price"><p>$266.00</p></div>
			<div class ="product-option"></div>
		</a>
		<a href="" class = "product-item">
			<div class ="product-image">
				<img class="product-image-resize" src="/php/coach_espacio/images/products/5726-614-fanal-love1.jpg">
			</div>

			<!-- if no stock o descuento -->
			<div class ="product-special"></div>

			<div class ="product-title"><p>Fanal Love</p></div>
			<div class ="product-price"><p>$575.00</p></div>
			<div class ="product-option"></div>
		</a>
		<a href="" class = "product-item">
			<div class ="product-image">
				<img class="product-image-resize" src="/php/coach_espacio/images/products/5752-493-pilgrim-0005-combopandas.jpg">
			</div>

			<!-- if no stock o descuento -->
			<div class ="product-special"></div>

			<div class ="product-title"><p>Mini almohadones panda X3</p></div>
			<div class ="product-price"><p>$276.00</p></div>
			<div class ="product-option"></div>
		</a>
	</div>

	<?php include('php/footer.include.php') ?>
	<script>
		var item = document.getElementById("test");
		var price = item.querySelector(".product-price");
		var option = item.querySelector(".product-option");
		item.addEventListener('mouseover', function(){
			price.style.opacity="0";
			option.style.opacity="1";
		});

		item.addEventListener('mouseout', function(){
			price.style.opacity="1";
			option.style.opacity="0";
		});

	</script>
</body>
</html>