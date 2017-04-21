<?php  
    session_start();
    include('common.php');

    $email="";
    $errors=[];

    if ($_POST) {
        //validar datos
        if (validData()) {
            $users = getUsers();
        
            if (!emailExists($users)) {
                saveUser($users);

                $path = dirname(__FILE__).'/../images/';
                saveImage('avatar',$path);
               
            } else {
                $email = trim($_POST['email']);
                $errors['email'] = "El mail ya existe";
            }
        }

    if ($errors) {
        $_SESSION['errors'] = $errors;
        header('location: ../register.php');
    }
        
    }
?>