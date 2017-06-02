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

	}

	public function checkCookies(){
		//Chequea si existen y si son los mismos datos 
		//correspondientes al usuario
	}

	public function autoLoguear(){

	}

	public function logOut(){
		//Unset session
	}

	public function unsetCookie(){

	}

}
