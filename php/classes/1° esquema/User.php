<?php 

require_once 'Model.php';

class User extends Model{
	private $nombre;
	private $apellido;
	private $email;
	private $username;
	private $password;
	private $avatar;

	public static $primaryKey = 'username';
	public static $tableName = 'users';

	public function __construct($db,$username=false){
		//Se le asigna la base que se utilizara 
		//a Model (parámetro $db)
		parent::__construct($db);
		if ($username) {
			$this->setUsername($username);
		}
	}

	public function setAllValues($nom,$ap,$email,$pass,$avatar,$path,$user=false){
		if ($user) {
			$this->setUsername();
		}
		$this->setNombre($nom);
		$this->setApellido($ap);
		$this->setEmail($email);
		$this->setPassword($pass);
		$this->setAvatar($avatar,$path);
	}

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
		$pictureName = 'default.png';
		if (isset($_FILES[$avatar]) && ($result = $this->saveImage($avatar,$path))  {
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

	public function toArray(){
		/*Esta funcion se utiliza para agregar al json el array del user*/
		$usuarioArray = [];
		$usuarioArray['nombre'] = $this->nombre;
		$usuarioArray['apellido'] = $this->apellido;
		$usuarioArray['email'] = $this->email;
		$usuarioArray['username'] = $this->username;
		$usuarioArray['password'] = $this->password;
		return $usuarioArray;
	}
	
	public function toModel($data){	
		//De array asociativo a model (user)
		$this->setNombre($data['nombre']);
		$this->setApellido($data['apellido']);
		$this->setEmail($data['email']);
		//No lo seteo porque lo hashea de vuelta
		//y cambiará el valor.
		$this->password = $data['password'];
		$this->setUsername($data['nombre']);
	}
							 //upload
	public function saveImage($avatar,$path){
		if ($_FILES[$avatar]['error'] == UPLOAD_ERR_OK) {
            $nombre = $_FILES[$avatar]['name'];
            $archivo = $_FILES[$avatar]['tmp_name'];
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
}
