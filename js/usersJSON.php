<?php  
	
	require_once("../php/controllers/DatabaseSupport.php");

	$repoUsers = $repo->getRepositorioUsuarios();

	$repoUsers->getUser($_GET['username']);

	$usersNumber = json_decode($nameUsers);

	echo count($usersNumber);

?>