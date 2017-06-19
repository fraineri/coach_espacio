<?php 
	require_once("controllers/DatabaseSupport.php");
	$auth->logout();
	header("Location: ../index.php");
	exit;