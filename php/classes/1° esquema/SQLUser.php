<?php
/*no funciona, sólo planteo*/
require_once 'RepoSQL.php';

class SQLUser extends RepoSQL {
	public function find($value,$model){
		$query = $db->query('SELECT * FROM usuarios where usuario=$value');
		/*devuelve objeto, con Fetch_Assoc lo paso a un 
		Array cuyos índices son los nombres de las columnas de la Tabla*/
		$results = $query->fetch(PDO::FETCH_ASSOC);
		/* devuelve un array*/
		return $results;
	}
	
	public function findAll($model){
		$query = $db->query('SELECT * FROM usuarios');
		/*devuelve objeto, con Fetch_Assoc lo paso a un 
		Array de Arrays cuyos índices son los nombres de las columnas de la Tabla*/
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
		return $results;
	}
	public function save($model){
		/*necesito un parámetro que sea un array para AGREGARLO o Modificar la tabla, 
		pero no TODO el array de array. Si regrabo toda la tabla creo q tardaría mucho*/
		$queIns= $db->query('INSERT INTO usuarios (id_usuarios, nombre, apellido, 
			usuario, email, password, cambiar_pass, path, picture, mailing) 
			values (default,)');
	}
}



