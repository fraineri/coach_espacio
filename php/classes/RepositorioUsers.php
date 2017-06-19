<?php

abstract class RepositorioUsers {
	abstract public function save(User $usuario);
	abstract public function findAll();
    abstract public function updateUser(User $usuario);

    public function getUser($username) {
        if ($usuarios = $this->findAll()) {
            foreach($usuarios as $usuario){
                if ($usuario->getPrimaryValue() == $username){
                    return $usuario;
                }
            }
        }
        return false;
    }
}
