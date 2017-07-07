<?php

require_once("Repositorio.php");
require_once("RepositorioUsersJson.php");
class RepositorioJSON extends Repositorio {

	public function __construct() {
		$this->repoUser = new RepositorioUsersJSON();
	}
}

