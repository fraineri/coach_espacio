<?php 

class Auth{
	private $user;

	function __construct ($user){
		$this->user = $user;
	}

	public function loguear(){
		//session
	}

	public function traerUsuarioLogueado(){
		//Buscar usuario en repo acorde a su primaryvalue
	}

	public function estaLogueado(){
		//isset session and session[username] === user->username
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

	public function autoLoguear(){

	}

	public function logOut(){
		//Unset session
	}

	public function unsetCookie(){

	}

}
