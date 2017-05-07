<?php 
    /*validar datos del registro de usuario*/
    
    function validarDatos(){
        $errores=[];
        if(isset($_POST['nombre'])){
            $nombre = limpiarDato($_POST['nombre']);
            if($nombre == ""){ $errores['nombre'] = "Falta nombre.";}
            if(strlen($nombre) > 30){ $errores['nombre'] = "Nombre mayor a 30 caracteres.";}    
            if(!ctype_alpha($nombre)){ $errores['nombre'] = "Nombre invalido.";}
        }
        if(isset($_POST['apellido'])){
            $apellido = limpiarDato($_POST['apellido']);
            if($apellido == ""){ $errores['apellido'] = "Falta apellido.";}
            if(strlen($apellido) > 40){ $errores['apellido'] = "Apellido mayor a 30 caracteres.";}
            if(!ctype_alpha($apellido)){ $errores['apellido'] = "Apellido invalido.";}
        }
        if(isset($_POST['email'])){
            $email = limpiarDato($_POST['email']);
            if($email == ""){ $errores['email'] = "Falta email.";}
            if(strlen($email) > 30){ $errores['email'] = "Email mayor a 30 caracteres.";}
            if(!filter_var($email,FILTER_VALIDATE_EMAIL)){ $errores['email'] = "Email invalido";}
        }
        if(isset($_POST['usuario'])){
            $usuario = limpiarDato($_POST['usuario']);
            if($usuario == ""){ $errores['usuario'] = "Falta usuario.";}
            if(strlen($usuario) > 20){ $errores['usuario'] = "Usuario mayor a 20 caracteres.";}
        }
        if(isset($_POST['password'])){
            $password = $_POST['password'];
            if($password == ""){ $errores['password'] = "Falta contraseña.";}
            if(strlen($password) > 30){ $errores['password'] = "contraseña mayor a 30 caracteres.";}
        }
        if(isset($_POST['password2'])){
            $password2 = $_POST['password2'];
            if($password2 == ""){ $errores['password2'] = "Falta repetir contraseña.";}
            if($password2 != $_POST['password']){ $errores['password2'] = "Contraseñas distntas.";}
        }
        return $errores;
    }

    /* Limpio el dato para la validacion */
    function limpiarDato($dato){
        //Quito espacios.
        $dato = trim($dato);
        //Quito contrabarra.
        $dato = stripslashes($dato);
        //Caracteres especiales a codigo html.
        $dato = htmlspecialchars($dato);

        //Retorno el dato limpio.
        return $dato;
    }


    /*pasar el json a formato array*/
	function getUsers($path){
        $usuarios = @file_get_contents($path.'/usuarios.json');
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

        file_put_contents($path.'/usuarios.json', json_encode($usuarios));
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
        var_dump($_POST);

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

                var_dump($values);
                if ($_POST['actPsw']) {
                    if(password_verify($_POST['actPsw'], $values['password']) ){
                        if (($_POST['newPsw'] && $_POST['reNewPsw']) && ($_POST['newPsw'] === $_POST['reNewPsw'])) {
                            $users[$user]['password'] = password_hash($_POST['newPsw'], PASSWORD_DEFAULT);
                        }
                    } else{
                        echo "Las contraseñas no coinciden";
                    }
                }

                if ($_FILES['avatar']['name']) {
                    $pictureName= $_SESSION['usuario'].'.'.pathinfo($_FILES['avatar']['name'],PATHINFO_EXTENSION);
                    
                    if(!saveImage('avatar', $path."/pictures/", $_SESSION['usuario'])){
                        $users[$user]['picture'] = $pictureName;
                        $_SESSION['picture'] = $pictureName;
                    }
                }

            }      
        }
        file_put_contents($path.'/usuarios.json', json_encode($users));
        
    }
?>