<?php
/*no funciona, sólo planteo*/
require_once 'RepoSQL.php';

class SQLUser extends RepoSQL {
	public function find($value,$model){
		$query = $db->query('SELECT * FROM usuarios');
		/*devuelve objeto, con Fetch_Assoc lo paso a un 
		Array de Arrays cuyos índices son los nombres de las columnas de la Tabla*/
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
	}
	
	public function findAll($model){
		$query = $db->query('SELECT * FROM usuarios');
		/*devuelve objeto, con Fetch_Assoc lo paso a un 
		Array de Arrays cuyos índices son los nombres de las columnas de la Tabla*/
		$results = $query->fetchAll(PDO::FETCH_ASSOC);
	}
	public function save($model){
		$queIns= $db->query('INSERT INTO usuarios (id_usuarios, nombre, apellido, 
			usuario, email, password, cambiar_pass, path, picture, mailing) 
			values (default,)');
	}
}



