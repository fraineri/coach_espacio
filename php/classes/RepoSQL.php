<?php
/*no funciona*/
require_once 'Repo.php';

try { $db = new PDO('mysql:host=localhost;dbname=db_coach_espacio;charset=utf8mb4','root','123456');
} catch (PDOException $e) {
	echo "<h1>La base de datos no está disponible</h1>";
}

abstract class RepoSQL extends Repo{
	public $db;

	abstract public function find($value,$model);
	abstract public function findAll($model);
	abstract public function save($model);
}