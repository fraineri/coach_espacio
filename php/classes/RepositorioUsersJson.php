<?php
require_once("RepositorioUsers.php");

class RepositorioUsersJSON extends RepositorioUsers {

	public function findAll() {
        $usuarios = @file_get_contents(/*path.*/'usuarios.json');
        if (!$usuarios) {
            $finalUsers = [];
        } else {
            $usuarios = json_decode($usuarios,true);
            foreach ($usuarios as $usuarioJson) {
                $u = new User();
                $u->toModel($usuarioJson);
                $finalUsers[] = $u;
            }
        }
        return $finalUsers;
    }

    public function save(User $usuario) {
        $file = @file_get_contents('usuarios.json');
        $users = json_decode($file,true);
        $users[] = $usuario->toArray();
        file_put_contents("usuarios.json", json_encode($users));
    }
}