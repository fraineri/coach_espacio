<?php
require_once ('RepositorioUsers.php');

class RepositorioUsersSql extends RepositorioUsers {
	public $pdo;

/*acomodarla a este nuevo esquema*/
/*public function __construct ($table){
		$this->$tableName = $table;
		//¿me falta un this??
		try { $pdo = new PDO('mysql:host=localhost;dbname=db_coach_espacio;charset=utf8mb4','root','123456');
			} catch (PDOException $e) {
			echo "<h1>La base de datos no está disponible</h1>";
			}
		$this->setPrimaryKey();/* setPrimaryKey la hereda de database*
	}*/

	public function save(User $usuario){
		$queIns= $pdo->query('INSERT INTO $tableName (id_usuarios, nombre, apellido, 
			usuario, email, password, cambiar_pass, path /*lo pone como funcion, ¿cambiar nombre del campo en la db???*/, picture, mailing) 
			VALUES (default,/* sacar valores de $usuario*/)');
	}

	}

	public function findAll(){
		$query = $pdo->query('SELECT * FROM $tableName');
		/*devuelve objeto, con Fetch_Assoc lo paso a un 
		Array de Arrays cuyos índices son los nombres de las columnas de la Tabla*/
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		return $results;

	}

    public function updateUser(User $usuario){
    	$query = $pdo->query('UPDATE $tableName set /*campo = nuevo valor de TODO $usuario*/ WHERE primaryKey = $usuario->username');

    }

    /*public function findClause($campo, $value){
		$query = $pdo->query('SELECT * FROM $tableName WHERE $campo = $value');
		/*devuelve objeto, con Fetch_Assoc lo paso a un 
		Array cuyos índices son los nombres de las columnas de la Tabla*
		$results = $query->fetch(PDO::FETCH_ASSOC);
		/* devuelve array*
		return $results;
	}*/

	public function jsonToSql($json){
//decode json 
//pasarlo a array de array
//forEach array de jason hacer Insert en tabla		
	}

}