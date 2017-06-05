<?php

class mProduct extends Manager{
	
	function __construct($product)
	{
		$this->model = $product
	}

	public function getByPrecio(){
		/* TABLE - REGISTRO - VALOR DE BUSQUEDA  */
		$this->db->getBy($this->model->getTable(), 'price', $this->model->precio);
	}
}