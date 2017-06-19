<?php
require_once("RepositorioUsers.php");

class RepositorioUsersJSON extends RepositorioUsers {
    private $userRoute;
    
    public function __construct(){
        $this->userRoute = $_SERVER['DOCUMENT_ROOT'].'/php/coach_espacio/php/users/';
    }

	public function findAll() {
        $usuarios = @file_get_contents($this->userRoute.'usuarios.json');
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
        $file = @file_get_contents($this->userRoute.'usuarios.json');
        $users = json_decode($file,true);
        $users[] = $usuario->toArray();
        file_put_contents($this->usersRoute."usuarios.json", json_encode($users));
    }
}