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
	function getUsers($path){
        $usuarios = @file_get_contents($path.'\usuarios.json');
        if (!$usuarios) {
            $usuarios = [];
        }else{
            $usuarios = json_decode($usuarios,true);
        }
        return $usuarios;
    }
    
    /*agrega el nuevo usuario a usuario.json*/
    function saveUser($path,$picture){
        $usuarios= getUsers($path);
        $new = [
            'nombre' => $_POST['nombre'],
            'apellido' => $_POST['apellido'],
            'email' => $_POST ['email'],
            'usuario'=> $_POST['usuario'],
            'password' => password_hash($_POST['password'], PASSWORD_DEFAULT),
            'path'=> $path,
            'picture' => $picture
        ];
        $usuarios[] = $new;

        file_put_contents($path.'\usuarios.json', json_encode($usuarios));
    }

    /*guarda la foto del avatar, 
    devuelve un array de errores pero despues no lo usamos, no creo q sea un campo obligatorio*/
    function saveImage($upload,$path,$fileName){
        $errores = [];
        echo $path."<br>";
        if ($_FILES[$upload]['error'] == UPLOAD_ERR_OK) {
            $nombre = $_FILES[$upload]['name'];
            $archivo = $_FILES[$upload]['tmp_name'];
            $ext = pathinfo($nombre,PATHINFO_EXTENSION);

            if($ext !='png' && $ext != 'jpg'){
                $errores[]='No se puede subir un archivo con este formato';
            } else {
                move_uploaded_file($archivo, $path.$fileName.'.'.$ext);
            }
        } else{
            $errores[] = "No se pudo guardar la foto";
        }
        return $errores;
    }

    function usernameExists ($path){
        $users = getUsers($path);
    	$found = false;
    	$i=0;
    	while ($i < count($users) && !$found) {
    		if ($users[$i]['usuario'] === $_POST['usuario']) {$found = $users[$i];}
    		else {$i++;}
    	}
    	return $found;
    }

    function updateUser($path){
        $users = getUsers($path);
        $currUser = false;
        $i = 0;
        echo "<pre>";
        
        foreach ($users as $user => $values) {
            if ($values['usuario'] === $_SESSION['usuario']) {
                if ($_POST['nombre']) {
                    $users[$user]['nombre'] = $_POST['nombre'];
                    $_SESSION['nombre'] = $users[$user]['nombre'];
                }

                if ($_POST['apellido']) {
                    $users[$user]['apellido'] = $_POST['apellido'];
                    $_SESSION['apellido'] = $users[$user]['apellido'];
                }

                if ($_POST['email']) {
                    $users[$user]['email'] = $_POST['email'];
                    $_SESSION['email'] = $users[$user]['email'];
                }

                if ($_FILES['avatar']['name']) {
                    $pictureName= $_SESSION['usuario'].'.'.pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
                    
                    if(!saveImage('avatar', $path."\pictures/", $_SESSION['usuario'])){
                        echo"aca";
                        $users[$user]['picture'] = $pictureName;
                        $_SESSION['picture'] = $pictureName;
                    }
                }
            }      
        }
        file_put_contents($path.'\usuarios.json', json_encode($users));
        header('location: ../../user-profile.php');
        exit;
    }
?>