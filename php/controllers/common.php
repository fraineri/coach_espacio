<?php 
	function validData(){
		$valid = true;

		return $valid;
	}

	function getUsers(){
        $users = @file_get_contents('usuarios.json');
        
        if (!$users) {
            $users = [];
        }else{
            $users = json_decode($users,true);
        }
        return $users;
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

    function saveUser($users){
    	$new = [
	        'nombre' => $_POST['name'],
	        'email' => $_POST ['email'],
	        'password' => password_hash($_POST['password'] ,PASSWORD_DEFAULT)
        ];
        
        echo"<br>";
        $users[] = $new;
        file_put_contents('usuarios.json', json_encode($users));
    }


    function saveImage($upload,$path){
    	$errores = [];
    	if ($_FILES[$upload]["error"] == UPLOAD_ERR_OK) {
    		$nombre = $_FILES[$upload]['name'];
    		$archivo = $_FILES[$upload]['tmp_name'];

    		$ext = pathinfo($nombre,PATHINFO_EXTENSION);

    		if($ext !='png' && $ext != 'jpg'){
    			$errores[]='No acepto la extension';
    		} else {
    			move_uploaded_file($archivo,$path.$_POST['name'].'.'.$ext);
    		}
    	}else{
    		$errores[] = "ey, no pude subir la foto";
    	}
    	return $errores;
    }
?>