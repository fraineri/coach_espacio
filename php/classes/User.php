<?php 

class User {
	private $nombre;
	private $apellido;
	private $email;
	private $username;
	private $password;
	private $avatar;

	function __construct($username = false){
		if ($username) {
			$this->setUsername($username);
		}
	}

	public function setAllValues($nom,$ap,$email,$pass,$avatar,$user=false){
		if ($user) {
			$this->setUsername($user);
		}
		$this->setNombre($nom);
		$this->setApellido($ap);
		$this->setEmail($email);
		$this->setPassword($pass);
		$this->setAvatar($avatar,'');
	}


	public function toArray(){
		//Esta funcion se utiliza para agregar al json el array del user
		$usuarioArray = [];
		$usuarioArray['nombre'] = $this->nombre;
		$usuarioArray['apellido'] = $this->apellido;
		$usuarioArray['email'] = $this->email;
		$usuarioArray['usuario'] = $this->username;
		$usuarioArray['password'] = $this->password;
		$usuarioArray['avatar'] = $this->avatar;
		return $usuarioArray;
	}

	public function toModel($datos){
		$this->nombre = $datos['nombre'];
		$this->apellido = $datos['apellido'];
		$this->email = $datos['email'];
		$this->password = $datos['password'];
		$this->username = $datos['usuario'];
		$this->avatar = $datos['avatar'];
	}

							 //upload
	public function saveImage($avatar,$path){
		if ($avatar['error'] == UPLOAD_ERR_OK) {
            $nombre = $avatar['name'];
            $archivo = $avatar['tmp_name'];
            $ext = pathinfo($nombre,PATHINFO_EXTENSION);

            if($ext !='png' && $ext != 'jpg'){
                $errores[]='No se puede subir un archivo con este formato';
            } else {
            	$fileName = $this->getUsername().'.'.$ext;
                move_uploaded_file($archivo, $this->getPath().$fileName);
				return $fileName;
            }
		} else{
	            $errores[] = "No se pudo guardar la foto";
	    }
		return false;
	}

	public function save($repo) {
		$repo->save($this);
	}

	/******************GETTERS & SETTERS**************************/

	public function setNombre($nom){
		$this->nombre= $nom;
	}
	public function setApellido($ape){
		$this->apellido =$ape;
	}
	public function setEmail($email){
		$this->email =$email;
	}
	public function setUsername($user){
		$this->username=$user;
	}
	public function setPassword($pass){
		$this->password = password_hash($pass, PASSWORD_DEFAULT);
	}
	public function setAvatar($avatar,$path){
		/*Avatar es el $_FILES['avatar']*/
		$pictureName = 'default.png';
		
		if (($avatar) && ($result = $this->saveImage($avatar,$path) ))  {
			$this->avatar = $result;
		}
		$this->avatar = $pictureName;
	}

	public function getPrimaryValue(){
		return $this->getUsername();
	}
	public function getNombre(){
		return $this->nombre;
	}
	public function getApellido(){
		return $this->apellido;
	}
	public function getEmail(){
		return $this->email;
	}
	public function getUsername(){
		return $this->username;
	}
	public function getPassword(){
		return $this->password;
	}
	public function getAvatar(){
		//Usar saveImage
		return $this->avatar;
	}
}
