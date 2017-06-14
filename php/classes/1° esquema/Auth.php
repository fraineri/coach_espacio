<?php 

class Auth{
	private $user;

	function __construct ($user=null){
		$this->user = $user;
	}

	public function loguear(){
		$_SESSION['usuario'] = $user->'usuario';
		$_SESSION['nombre'] = $user->'nombre';
		$_SESSION['apellido'] = $user->'apellido';
		$_SESSION['email'] = $user->'email';
		$_SESSION['picture'] = $user->'picture';
	}

	public function estaLogueado(){
		//isset session and session[username] === user->username
		return (isset($_SESSION['username']) && $_SESSION['username'] == $this->user->getUsername());
	}

	public function saveCookies(){
		$expira= time()+ (60*60*24*365);
		setcookie("usuario", $_POST['usuario'], $expira,'/');
		$largoPass=strlen($_POST['password']);
		setcookie("recordame", $largoPass, $expira,'/');
		setcookie("passHash", $user['password'], $expira, '/');
	}

	public function checkCookies(){
		//Chequea si existen y si son los mismos datos 
		//correspondientes al usuario
		return (isset($_COOKIE["usuario"]) && ($_COOKIE["passHash"]==$user['password']) && ($_COOKIE["usuario"]==$_POST['usuario']));
	}

	public function logOut(){
		session_unset();
	}

	public function unsetCookie(){
		unset($_COOKIE['usuario']);
		unset($_COOKIE['recordame']);
		unset($_COOKIE['passHash'])
	}
}
