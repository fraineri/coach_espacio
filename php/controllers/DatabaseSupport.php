<?php
	require_once("../classes/Auth.php");
	require_once("../classes/RepositorioJSON.php");

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