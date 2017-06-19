<?php

	abstract Class Repositorio {
		protected $repoUser;

		public function getRepositorioUsuarios() {
			return $this->repoUser;
		}
	}

