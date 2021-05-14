<?php
class ConfigurationData {
	public static $tablename = "configuracion";
	public $name = "";
	public $label = "";
	public $kind = "1";
	public $val = "";
	public $cfg_id = "1";
	public $created_at = "NOW()";
	public function __construct( $data = array() ){
		foreach ($data as $key => $value) {
			$this->{$key} = $value;
		}
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (name,label,kind,val,cfg_id,created_at) ";
		$sql .= "value ('$this->name','$this->label','$this->kind','$this->val','$this->cfg_id','$this->created_at')";
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

// partiendo de que ya tenemos creado un objecto ConfigurationData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set name=\"$this->name\",short_name=\"$this->short_name\",is_active=\"$this->is_active\" where id=$this->id";
		Executor::doit($sql);
	}

	public function updateOrderFromName($name,$val){
		$sql = "update ".self::$tablename." set order=\"$val\" where name=\"$name\"";		
		Executor::doit($sql);
	}

	public function updateValFromName($name,$val){
		$sql = "update ".self::$tablename." set val=\"$val\" where name=\"$name\"";		
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ConfigurationData());
	}

	public static function getByPreffix($id){
		$sql = "select * from ".self::$tablename." where name=\"$id\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ConfigurationData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ConfigurationData());
	}

	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where is_active=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ConfigurationData());
	}

}

?>