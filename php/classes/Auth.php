<?php 
	require_once("User.php");
	require_once("RepositorioUsers.php");
	
	class Auth {

		public static $instance;

		public static function getInstance(RepositorioUsers $repoUsuarios) {
			if (self::$instance == NULL) {
				self::$instance = new Auth();
				self::$instance->autologuear($repoUsuarios);
			}

			return self::$instance;
		}

		public function loguear(User $usuario) {
			@session_start();
        	$_SESSION['usuario'] = $usuario->getUsername();
			$_SESSION['nombre'] = $usuario->getNombre();
			$_SESSION['apellido'] = $usuario->getApellido();
			$_SESSION['email'] = $usuario->getEmail();
			$_SESSION['picture'] = $usuario->getavatar();
    	}

    	public function traerUsuarioLogueado(RepositorioUsers $repo) {
	        if (!$this->estaLogueado()) {
	            return null;
	        }
	        $username = $_SESSION["username"];
	        return $repo->traerUsuarioPorEmail($username);
	        //el metodo traerUsuarioPorEmail no se llama getUser en nuestro modelo?
	    }

	    public function estaLogueado() {
	        return isset($_SESSION["username"]);
	    }


	    public function guardarCookie(User $usuario,$largoContra) {
	        $expira= time()+ (60*60*24*365);
			setcookie("usuario", $usuario->getUsername(), $expira,'/');
			setcookie("recordame", $largoContra, $expira,'/');
			setcookie("passHash", $usuario->getPassword(), $expira, '/');
	    }

	    private function autologuear(RepositorioUsers $repo) {
	        session_start();
	        if (!$this->estaLogueado()) {
	            if (isset($_COOKIE["username"])) {
	                $usuario = $repo->getUser($_COOKIE["usuario"]);
	                //usamos getUser o traeUsuarioPorEmail??
	                $this->loguear($usuario);
	            }
	        }
    	}

    	public function checkCookies($user,$repo){
			$u = $repo->getRepositorioUsuarios()->getUser($user);
			return ($u && isset($_COOKIE["usuario"]) && 
				($_COOKIE["usuario"]==$user) && 
				(($u->getPassword()) == $_COOKIE["passHash"])) ;
		}

		public function logout(){
			session_destroy();
		//dario hace un $this-> unsetCookie acá, hace falta??
		}

		private function unsetCookie(){
			unset($_COOKIE['usuario']);
			unset($_COOKIE['recordame']);
			unset($_COOKIE['passHash']);
		}
	}

	