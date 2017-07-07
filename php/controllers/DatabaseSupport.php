<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/DigitalHouse/proyecto/coach_espacio/php/classes/Auth.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/DigitalHouse/proyecto/coach_espacio/php/classes/RepositorioJson.php");

	$tipoRepositorio = "json";


	switch($tipoRepositorio) {
		case "json":
			$repo = new RepositorioJSON();
			break;
		case "sql":
			/*$repo = new RepositorioSQL();
			break;*/
	}

	$auth = Auth::getInstance($repo->getRepositorioUsuarios());

?>