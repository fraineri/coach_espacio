<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/faq.css">
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<link href="https://fonts.googleapis.com/css?family=Yantramanav" rel="stylesheet"> 
	
	<title>Coaching | Preguntas Frecuentes</title>

</head>
<body>
	<!--menu horizontal-->
	<?php
		$activePage = 'faq.php'; 
		$userLogin = 'd';
			/*$userLogin = isset($_SESSION['username'])?$_SESSION['username']:null
			*/
		include('php/header.include.php');
	?>

	<!--6 preguntas en un container-->		
	<div class="container-faq">
			<div class ="page-title">
				<h1>Preguntas Frecuentes</h1>
			</div>
			<div class="pregunta p1">
				<h2>¿Alguien viene a arreglarme la casa?</h2>
				<p>La propuesta es ayudarte a que vos mismo puedas identificar en qué tipo de espacio querés vivir, qué objetos querés que te rodeen. También que puedas generar espacios donde disfrutar de esos objetos y que puedas mantener el orden y la belleza sin esfuerzo. Por eso, no serviría que otro decida por vos. Te guiaremos para que puedas lograr un espacio bello y ordenado que resuene contigo. Identificaremos cuáles son la cosas que te generan alegría y luego les buscaremos el mejor lugar y forma de guardarlo. Así vivirás en espacios donde te sentirás rodeada de alegría y armonía!</p>
				<br>
			</div>
			<div class="pregunta p2">
				<h2>¿Qué pasa si hay cosas viejas que no quiero tirar?</h2>
				<p>No tengas miedo, nadie te obligará a hacer algo que no quieras! Nuestra propuesta es ayudarte a que puedas darte cuenta de qué es lo que realmente resuena contigo y querés conservar cerca tuyo, y qué cosas están ocupando un espacio donde no aportan belleza y alegría. Vos mismo decidirás qué cosas te seguirán acompañando y cuáles seguirán su camino.</p>
				<br>
			</div>
			<div class="pregunta p3">
				<h2>¿Qué pasa si no quiero tirar nada?</h2>
				<p>Muchas veces me preguntan con temor si tendrán que tirar muchas cosas! El foco de nuestro trabajo no es tirar cosas, sino generar espacios vitales que nos recuerden la belleza y armonía que queremos para nuestras vidas. Conservar objetos y dejarlos ir será una consecuencia de esta búsqueda.</p>
				<br>
			</div>
			<div class="pregunta p4">
				<h2>¿Es sólo para hogares? ¿Puede hacerse un una oficina?</h2>
				<p>Claro que si! La propuesta es para todo espacio en el que pasemos tiempo. Mejorar nuestra experiencia en cada espacio que habitemos. 
				Trabajar en un espacio que sintamos armónico y bello, nos ayuda a trabajar de manera más fluida, baja el ruido externo para potenciar nuestra creatividad y abundancia interna.
				</p>
				<br>
			</div>
			<div class="pregunta p5">
				<h2>¿Tiene que estar toda la familia?</h2>
				<p>Lo ideal es comenzar trabajando con mamá y/o papá, que luego irá transmitiendo al resto de la familia esta nueva manera de relacionarnos con los objetos y los espacios.
				Sí hay dos condiciones importantes que respetar. Una, que la persona que reciba la asisitencia esté queriendo este cambio. Y dos, que cuando se trate de objetos personales, sea esa persona quién decida sobre ellos.</p>
				<br>
			</div>
			<div class="pregunta p6">
				<h2>No vivo en BA, ¿puede alguien venir a mi zona?</h2>
				<p>Si bien por ahora sólo trabajamos de manera presencial en BA, podemos usar una metodología de asistencia a distancia. Las entrevistas serán vía web (skype, zoom...), con cámara para poder ver los espacios, y te iremos guiando en los pasos a seguir, con tareas para hacer entre cada contacto.</p>
				<br>
			</div>
	</div>
	
	<!--FOOTER-->
	<?php include('php/footer.include.php') ?>
</body>
</html>