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
        file_put_contents($this->userRoute."usuarios.json", json_encode($users));
    }

    public function updateUser(User $usuario){
        $updated = $usuario->toArray();
        $file = @file_get_contents($this->userRoute.'usuarios.json');
        $users = json_decode($file,true);
        foreach ($users as $user => $value) {
            if ($value['usuario'] == $updated['usuario']) {
                $users[$user]['nombre'] = $updated['nombre'];
                $users[$user]['apellido'] = $updated['apellido'];
                $users[$user]['email'] = $updated['email'];
                $users[$user]['password'] = $updated['password'];
                $users[$user]['avatar'] = $updated['avatar'];
            }
        }
        file_put_contents($this->userRoute."usuarios.json", json_encode($users));
    }
}