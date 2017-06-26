<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/home.css">
		<link rel="stylesheet" type="text/css" href="css/main.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">

		<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<script src="http://code.jquery.com/jquery-latest.min.js"
        type="text/javascript"></script>	
		<title>Coaching | Home</title>
	</head>
	<body>
		<?php  
			session_start();

			if (isset($_SESSION['lastActivity']) && (time() - $_SESSION['lastActivity'] > 1800)) {
			    session_unset();
			    session_destroy();
			}
			$_SESSION['lastActivity'] = time();
			
		?>
		<!-- Home Header -->
		<div class ="banner">	
		</div>
		<div class ="banner-things">
			<div>
				<h1 class ="banner-title">Coach de Espacios</h1>
			</div>
			<div class="banner-knowus">
				<a href="#knowus"><i class="banner-arrow fa fa-arrow-down fa-4x" aria-hidden="true"></i></a>
			</div>
			<div class ="container-dots">
				<ul class = "galery-dots"></ul>
			</div>
		</div>

		<?php
			$userLogin = isset($_SESSION['nombre'])?$_SESSION['nombre']:null;
			$activePage = 'index.php'; 
			include('php/header.include.php');
		?>

		<!-- Section Container -->
		<div class ="section-container">
			<!-- ABOUT -->
			<div id ="knowus" class ="mainSection about">
				<h1 class ="page-title">Quiénes somos</h1>
				<div class="about-intro">
					<div class ="align-info">
						<div>
							<p>Somos una organización especializada en coaching de espacios. Nosotros te podremos guiar y enseñar cómo acomodar el lugar deseado. Te ayudaremos a descubrir las cosas que ya no utilizas para que te deshagas de ellas y poder aprovechar y disfrutar al máximo tu espacio.</p>
						</div>
					</div>

					<div class ="about-intro-description">
						<div>
							<img src="images/icons/reloj(1).png">
							<h2 class="intro-description-title">¿No tenés tiempo para acomodar la habitación?</h2>
							<p>Nosotros pensamos por vos! Te ayudaremos a notar qué cosas ya no son necesarias en tu lugar. Podrás aprender a ver en tu espacio distintas soluciones para disfrutarlo lo mejor posible.</p>
						</div>
					</div>

					<div class ="about-intro-description">
						<div>
							<img src="images/icons/dormir.png">
							<h2 class="intro-description-title">¿Llegás todos los días a tu casa tarde?</h2>
							<p>Podremos hacer las reuniones durante el fin de semana para que no pierdas tiempo.</p>
						</div>
					</div>

					<div class ="about-intro-description">
						<div>
							<img src="images/icons/percha.png">
							<h2 class ="intro-description-title">¿No sabes por dónde arrancar en tu placard?</h2>
							<p>Nosotros te ayudamos a limpiarlo y a implementar distintos métodos para que facilmente mantengas el orden.</p>
						</div>
					</div>

					<div class ="about-intro-description">
						<div>
							<img src="images/icons/sillon.png">
							<h2 class ="intro-description-title">¿Tenés una oficina nueva?</h2>
							<p>Es importante tener una buena presentación. Te ayudaremos a hacer de tu lugar un espacio ameno para vos y tus clientes!</p>
						</div>
					</div>

					<div class ="about-intro-description">
						<div>
							<img src="images/icons/camion-de-reparto.png">
							<h2 class ="intro-description-title">Donamos lo que no necesitás</h2>
							<p>Una vez terminados nuestros encuentros podrás optar por donar 
							objetos, ropas, etc a hogares para que ellos lo disfruten. Nosotros nos encargamos de entregarlo!.</p>
						</div>
					</div>	
				</div>
			</div>
			<!-- About Work Steps -->
			<div class ="about-work">
				<h1 class="page-title">Cómo trabajamos</h1>
				<div class = "step-numbers">
					<div class ="step-number-conf title-step-one">
						<p>1</p>
					</div>					
					<div class ="step-number-conf title-step-two">
						<p>2</p>
					</div>	
					<div class ="step-number-conf title-step-three">
						<p>3</p>
					</div>	
					<div class ="step-number-conf title-step-four">
						<p>4</p>
					</div>	
				</div>
				<div class ="work-steps">	
					<div class ="step circle-one">
						<h2 class ="circle-one work-step-title  title-step-one">Contactanos</h2>
						<p class ="work-step-text">Si estas interesado en ayudarte a reacomodar tu habitación podes contactarte con nosotros.</p>
					</div>

					<div class ="step circle-two">
						<h2 class ="circle-two work-step-title title-step-two">Entrevista</h2>
						<p class ="work-step-text">Coordinaremos una entrevista presencial o por skype para conocernos y poder saber en qué te ayudaremos.</p>
					</div>

					<div class ="step circle-three">
						<h2 class ="circle-three work-step-title title-step-three">Encuentro</h2>
						<p class ="work-step-text">Nos encontraremos en el lugar para comenzar a limpiar y deshacerte de lo que ya no necesitás</p>
					</div>

					<div class ="step circle-four">
						<h2 class ="circle-four work-step-title title-step-four">Mantenimiento</h2>
						<p class ="work-step-text">Podrás contactarnos para refrescar técnicas de guardado o estrategias si es que has vuelto a tus viejos hábitos</p>
					</div>
				</div>
			</div>
				<div class ="about-buttonCont">
					<a class ="standard-button button-red" href="contact.php">Contacto</a>
					<a class ="standard-button button-red" href="#">Portfolio</a>
				</div>
			</div>			
		</div>

		<!--FOOTER-->
		<?php include('php/footer.include.php') ?>
	</body>
	<script src="js/slide.js"></script>
	<script src="js/menu-style.js"></script>

</html>
