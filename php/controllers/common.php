<?php 
/*validar datos del registro de usuario*/
    function validarDatos(){
        $errores=[];
        $nombre= trim($_POST['nombre']);
        if ($nombre=="") {
            $errores[]="Faltó ingresa tu nombre";
        }
        $apellido= trim($_POST['apellido']);
        if ($apellido=="") {
            $errores[]="Faltó ingresa tu apellido";
        }
        $email= trim($_POST['email']);
        if ($email=="") {
            $errores[]="Faltó ingresa tu direccion de email";
        } elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
            $errores="El email no es válido";
        }
        $usuario= trim($_POST['usuario']);
        if ($usuario=="") {
            $errores[]="Faltó ingresa un Usuario";
        }
        if($_POST['password']!=$_POST['password2']) {
            $errores[]= "Las contraseñas no coinciden";
        }
        return $errores;
    }
/*pasar el json a formato array*/
	function getUsers(){
        $usuarios = @file_get_contents('usuarios.json');
        if (!$usuarios) {
            $usuarios = [];
        }else{
            $usuarios = json_decode($usuarios,true);
        }
        return $usuarios;
    }
/*agrega el nuevo usuario a usuario.json*/
     function saveUser($path){
        $usuarios= getUsers();
        $new = [
            'nombre' => $_POST['name'],
            'apellido' => $_POST['apellido'],
            'email' => $_POST ['email'],
            'usuario'=> $_POST['usuario'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'path'=> $path
        ];
        $usuarios[] = $new;
        file_put_contents('usuarios.json', json_encode($usuarios));
    }
/*guarda la foto del avatar, 
devuelve un array de errores pero despues no lo usamos, no creo q sea un campo obligatorio*/
    function saveImage($upload,$path){
        $errores = [];
        if ($_FILES[$upload]["error"] == UPLOAD_ERR_OK) {
            $nombre = $_FILES[$upload]['name'];
            $archivo = $_FILES[$upload]['tmp_name'];
            $ext = pathinfo($nombre,PATHINFO_EXTENSION);

            if($ext !='png' && $ext != 'jpg'){
                $errores[]='No aceptamos la extension';
            } else {
                $nombre=str_replace('@', '-', $_POST['email']);
                $nombre=str_replace('.', '-', $nombre);
                move_uploaded_file($archivo, $path.$nombre.'.'.$ext);
            }
        } else{
            $errores[] = "No se pudo guardar la foto";
        }
        return $errores;
    }

    function emailExists ($users){
    	$found = false;
    	$i=0;
    	while ($i < count($users) && !$found) {
    		if ($users[$i]['email'] === $_POST['email']) {$found = true;}
    		else {$i++;}
    	}
    	return $found;
    }

    function validData(){
        $valid = true;
        return $valid;
    }
?>