<?php
require_once 'database.php';

/* 1- ¿es abstract o no??? porq en gráfico es abstract*/
class dbSQL extends Database{
	public $pdo;
	private $tableName;
	private $primaryKey;
	private $pdo;

	public function __construct ($table, $model = false){
		$this->$tableName = $table;
		//2- ¿me falta un this??
		try { $pdo = new PDO('mysql:host=localhost;dbname=db_coach_espacio;charset=utf8mb4','root','123456');
			} catch (PDOException $e) {
			echo "<h1>La base de datos no está disponible</h1>";
			}
		if ($model) {
			$this->setModel($model);
		}	
	}

	public function setModel($model){
		#Model: Usuario o producto
		$this->model = $model;
		$this->$tableName = $model->tableName;
		$this->$primaryKey = $model->primaryKey;	
	}

	/*Analizará si es necesario agregar comillas al valor a la hora de crear la query.
	Dejo este analisis en una funcion por si llega a ser necesario agregar otro tipo de 
	dato a analizar que ahora no se nos ocurre.*/
	public function needQuotes($value){
		$type = gettype($value);
		return $type == "string" || $type == "date";
	}
	


	public function save($model){
		$array = $this->model->toArray();

		$sql = 'INSERT INTO '. $tableName. ' (';
		foreach ($array as $campo => $value) {
			$sql .= $campo.', ';
		}

		//sacar la ultima coma
		$sql = substr($sql,0,strlen($sql)-2);

		$sql .= ') VALUES ';
		foreach ($array as $campo => $value) {
			if($this->needQuotes($value)){
				$sql .= "'".$value."'";
			}
			else{
				$sql .= $value;
			}

			$sql.=', ';
		}

		//sacar la ultima coma
		$sql = substr($sql,0,strlen($sql)-2);

		$queIns= $pdo->query($sql);
	}

	/*no funca*/
	public function update($model){
		/*To do...*/
		$query = $pdo->query('UPDATE $tableName set /*campo = nuevo valor*/ WHERE primaryKey = $model->username');
	}


		/* $model tiene los siguientes atributos y métodos
	$model->getPrimaryValue();*/
		#getPrimaryValue() lo que hace es devolver el valor correspondiente al primary key del model...
		#Es decir   -> si model es el user devolverá el username ($user -> getUsername())
		#			-> si model es el producto devolverá el id ($product -> getId())
	public function find($value){
		$sql = 'SELECT * FROM '.$tableName.' WHERE '.$primaryKey.' = ';

		/*Esto se hace para saber si hay que poner comillas al valor o no en la query a sql.
		PARA ESTO SE USA LA FUNCTION NEEDQUOTES()*/
			#Un string o una fecha debe tener comillas.
			#Un valor entero no tiene que tener comillas
		if($this-> needQuotes($model->getPrimaryValue()) ){
			$sql .= '"'.$model->getPrimaryValue().'"';
		} else{
			$sql .= $model->getPrimaryValue();
		}

		$query = $pdo->query($sql);
		/*devuelve objeto, con Fetch_Assoc lo paso a un 
		Array cuyos índices son los nombres de las columnas de la Tabla*/
		$results = $query->fetch(PDO::FETCH_ASSOC);
		/* devuelve un array*/
		return $results;
	}

	public function findAll(){
		$query = $pdo->query("SELECT * FROM ".$TableName);
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

	public function jsonToSql($json){
//decode json 
//pasarlo a array de array
//forEach array de jason hacer Insert en tabla		
	}
}
