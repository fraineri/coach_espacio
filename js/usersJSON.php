<?php  
	
	require_once("../php/controllers/DatabaseSupport.php");

	$repoUsers = $repo->getRepositorioUsuarios();

	$users = $repoUsers->findAll();
	header("Content-type:application/json");
	print json_encode(['count'=>count($users)]);
?>