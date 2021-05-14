<?php
class ClientData {
	public static $tablename = "clientes";

	public function ClientData(){
		$this->nombre = "";
		$this->apellidos = "";
		$this->email = "";
		$this->password = "";
		$this->creado = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,apellidos,telefono,direccion,email,password,creado) ";
		$sql .= "value (\"$this->nombre\",\"$this->apellidos\",\"$this->telefono\",\"$this->direccion\",\"$this->email\",\"$this->password\",$this->creado)";
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

// partiendo de que ya tenemos creado un objecto ClientData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",apellidos=\"$this->apellidos\",direccion=\"$this->direccion\",telefono=\"$this->telefono\",email=\"$this->email\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_passwd(){
		$sql = "update ".self::$tablename." set password=\"$this->password\" where id=$this->id";
		Executor::doit($sql);
	}

	public function getFullname(){ return $this->nombre." ".$this->apellidos; }

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		$found = null;
		$data = new ClientData();
		while($r = $query[0]->fetch_array()){
			$data->id = $r['id'];
			$data->nombre = $r['nombre'];
			$data->apellidos = $r['apellidos'];
			$data->email = $r['email'];
			$data->direccion = $r['direccion'];
			$data->telefono = $r['telefono'];
			$data->password = $r['password'];
			$data->creado = $r['creado'];
			$found = $data;
			break;
		}
		return $found;
	}

	public static function getByEmail($mail){
		$sql = "select * from ".self::$tablename." where email=\"$mail\"";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ClientData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellidos = $r['apellidos'];
			$array[$cnt]->email = $r['email'];
			$array[$cnt]->password = $r['password'];
			$array[$cnt]->creado = $r['creado'];
			$cnt++;
		}
		return $array;
	}

	public static function getAll(){
		$sql = "select * from ".self::$tablename."";
		$query = Executor::doit($sql);
		$array = array();
		$cnt = 0;
		while($r = $query[0]->fetch_array()){
			$array[$cnt] = new ClientData();
			$array[$cnt]->id = $r['id'];
			$array[$cnt]->nombre = $r['nombre'];
			$array[$cnt]->apellidos = $r['apellidos'];
			$array[$cnt]->direccion = $r['direccion'];
			$array[$cnt]->telefono = $r['telefono'];
			$array[$cnt]->email = $r['email'];
			$array[$cnt]->password = $r['password'];
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
			$array[$cnt] = new ClientData();
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