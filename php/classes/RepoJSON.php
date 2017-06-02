<?php 

require_once('Repo.php');

class RepoJSON extends Repo{
	private $path;

	public function __construct($path){
		$this->path = $path;
	}

	public function find($value,$model){
		echo "Find";
	}

	public function findAll($model){
		//Con model obtengo la tabla la cual debo buscar
		echo "findAll";

	}

	public function save($model){
		echo"Estoy aca<br>";
		$current = $this->find($model::$primaryKey, $model);
		if (!$current) {
			/*No existe.. Lo agrego*/
			$usuario = $model->toArray();
			$registros = @file_get_contents($this->path);
			$registros = json_decode($registros, true);
			$registros[$model::$tableName][] = $usuario;
			file_put_contents($this->path, json_encode($registros));
		} else {
			//to do..
		}
	} 
}