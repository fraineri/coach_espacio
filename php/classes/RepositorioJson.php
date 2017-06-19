<?php

require_once("Repositorio.php");
require_once("RepositorioUsersJSON.php");
class RepositorioJSON extends Repositorio {

	public function __construct() {
		$this->repoUser = new RepositorioUsersJSON();
	}
}

