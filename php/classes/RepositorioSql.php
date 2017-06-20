<?php
require_once ('Repositorio.php');
require_once ('RepositorioUsersSql.php');
class RepositorioSql extends Repositorio {

	public function __construct() {
		$this->repoUser = new RepositorioUsersSql();
	}
	


}