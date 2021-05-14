<?php
class UserData {
	public static $tablename = "usuarios";

	public  function createForm(){
		$form = new lbForm();
	    $form->addField("nombre",array('type' => new lbInputText(array("label"=>"Nombre")),"validate"=>new lbValidator(array())));
	    $form->addField("apellidos",array('type' => new lbInputText(array("label"=>"Apellido")),"validate"=>new lbValidator(array())));
	    $form->addField("mail",array('type' => new lbInputText(array()),"validate"=>new lbValidator(array())));
	    $form->addField("password",array('type' => new lbInputPassword(array()),"validate"=>new lbValidator(array())));
	    return $form;

	}

	public function Userdata(){
		$this->nombre = "";
		$this->apellidos = "";
		$this->email = "";
		$this->password = "";
		$this->creado = "NOW()";
	}

	public function add(){
		$sql = "insert into usuarios (nombre,apellidos,nombre_usuario,email,password,creado) ";
		$sql .= "value (\"$this->nombre\",\"$this->apellidos\",\"$this->nombre_usuario\",\"$this->email\",\"$this->password\",$this->creado)";
		Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto UserData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre_usuario=\"$this->nombre_usuario\",nombre=\"$this->nombre\",email=\"$this->email\",apellidos=\"$this->apellidos\",administrador=$this->administrador,activo=$this->activo where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new UserData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$data->apellidos = $r['apellidos'];
			$data->nombre_usuario = $r['nombre_usuario'];
			$data->email = $r['email'];
			$data->password = $r['password'];
			$data->creado = $r['creado'];
			$data->administrador = $r['administrador'];
			$data->desarrollador = $r['desarrollador'];
			$data->activo = $r['activo'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getByMail($mail){
		echo $sql = "select * from ".self::$tablename." where mail=\"$mail\"";
		$query = Executor::doit($sql);
		$found = null;
		$data = new UserData();
		while($r = $query->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$data->mail = $r['mail'];
			$data->creado = $r['creado'];
			$found = $data;
			break;
		}
		return $found;
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new UserData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellidos = $r['apellidos'];
			$array[$cnt]->nombre_usuario = $r['nombre_usuario'];
			$array[$cnt]->email = $r['email'];
			$array[$cnt]->password = $r['password'];
			$array[$cnt]->activo = $r['activo'];
			$array[$cnt]->administrador = $r['administrador'];
			$array[$cnt]->desarrollador = $r['desarrollador'];
			$array[$cnt]->creado = $r['creado'];
			$cnt++;
		}
		return $array;
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%'";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new UserData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->mail = $r['mail'];
			$array[$cnt]->password = $r['password'];
			$array[$cnt]->creado = $r['creado'];
			$cnt++;
		}
		return $array;
	}


}

?>