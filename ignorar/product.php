<?php

class Product extends Model{
	protected $id;
	protected $tableName  = "productos"
	protected $primaryKey = "$id";

	public $nombre;
	public $precio;
	public $categoria;
	public $desc;

	function __construct(arguments){
		/* Setear valores */
		$this->setNombre();
		$this->setNombre();
		$this->setNombre();
		$this->setNombre();
	}

	public function setNombre($nombre){};
	public function setPrecio($precio){};
	public function setCategoria($categoria){};
	public function setDesc($desc){};

	public function getTable(){return $this->$tableName;}
	public function getKey(){return $this->$primaryKey;}
}

?>