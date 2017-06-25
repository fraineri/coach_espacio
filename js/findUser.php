<?php  

	require_once("../php/controllers/DatabaseSupport.php");

	$repoUsuarios = $repo->getRepositorioUsuarios();

	$response = ['exists'=>false];
	if ($repoUsuarios->getUser($_GET['username'])) {
		$response['exists'] = true;
	}

	print json_encode($response);
