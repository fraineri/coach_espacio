<?php
require_once 'database.php';

/* 1- ¿es abstract o no??? porq en gráfico es abstract*/
class dbSQL extends Database{
	public $pdo;

	function __construct ($table){
		$this->$tableName = $table;
		//2- ¿me falta un this??
		try { $pdo = new PDO('mysql:host=localhost;dbname=db_coach_espacio;charset=utf8mb4','root','123456');
			} catch (PDOException $e) {
			echo "<h1>La base de datos no está disponible</h1>";
			}
		$this->setPrimaryKey();/* setPrimaryKey la hereda de database*/
	}

	public function save($model){
		/*necesito un parámetro que sea tipo array para AGREGARLO o Modificar la tabla, 
		pero no TODO el array de array. Si regrabo toda la tabla creo q tardaría mucho*/
		$queIns= $pdo->query('INSERT INTO $tableName (id_usuarios, nombre, apellido, 
			usuario, email, password, cambiar_pass, path, picture, mailing) 
			VALUES (default,/* 3- ¿faltan los valores???*/)');
	}

	public function update($model){
		//UPDATE
	}

	public function find($value){
		$query = $pdo->query('SELECT * FROM $tableName WHERE primaryKey =$value');
		/*devuelve objeto, con Fetch_Assoc lo paso a un 
		Array cuyos índices son los nombres de las columnas de la Tabla*/
		$results = $query->fetch(PDO::FETCH_ASSOC);
		/* devuelve un array*/
		return $results;
	}

	public function findAll(){
		$query = $pdo->query('SELECT * FROM $tableName');
		/*devuelve objeto, con Fetch_Assoc lo paso a un 
		Array de Arrays cuyos índices son los nombres de las columnas de la Tabla*/
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}

	public function findClause($campo, $value){
		$query = $pdo->query('SELECT * FROM $tableName WHERE $campo = $value');
		/*devuelve objeto, con Fetch_Assoc lo paso a un 
		Array cuyos índices son los nombres de las columnas de la Tabla*/
		$results = $query->fetch(PDO::FETCH_ASSOC);
		/* devuelve array*/
		return $results;
	}
}
