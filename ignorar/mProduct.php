<?php

class mProduct extends Manager{
	
	function __construct($product){
		$this->model = $product
	}

	public function getByPrecio(){
		$this->db->findClause($campo,)
	}
}