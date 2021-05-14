<?php
class PaymethodData {
	public static $tablename = "metodo_pago";


	public function PaymethodData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,detalle,activo) ";
		$sql .= "value (\"$this->nombre\",\"$this->detalle\",$this->activo)";
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

// partiendo de que ya tenemos creado un objecto PaymethodData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->nombre\",detalle=\"$this->detalle\",activo=\"$this->activo\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_active(){
		$sql = "update ".self::$tablename." set activo=\"$this->activo\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PaymethodData());
	}

	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where detalle=\"$name\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PaymethodData());
	}

	public static function getByPreffix($id){
		$sql = "select * from ".self::$tablename." where detalle=\"$id\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new PaymethodData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new PaymethodData());
	}

	public static function getActives(){
		$sql = "select * from ".self::$tablename." where activo=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new PaymethodData());
	}

}

?>