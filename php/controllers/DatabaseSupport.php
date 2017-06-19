<?php
	require_once($_SERVER['DOCUMENT_ROOT']."/php/coach_espacio/php/classes/Auth.php");
	require_once($_SERVER['DOCUMENT_ROOT']."/php/coach_espacio/php/classes/RepositorioJSON.php");

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