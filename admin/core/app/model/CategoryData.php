<?php

class CategoryData {
	public static $tablename = "categorias";


	public function __construct(){
		$this->id = "";
		$this->nombre = "";
		$this->detalle_cat = "";
		$this->activo = "";
		$this->padre = -1;
	}
	

	public function add(){
		$sql = "insert into ".self::$tablename." (nombre,detalle_cat,activo,padre) ";
		$sql .= "value ('$this->nombre','$this->detalle_cat','$this->activo','$this->padre')";
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

// partiendo de que ya tenemos creado un objecto CategoryData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre='$this->nombre',detalle_cat='$this->detalle_cat',activo='$this->activo' where id='$this->id'";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CategoryData());
	}

	public static function getByName($name){
		$sql = "select * from ".self::$tablename." where nombre='$name'";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CategoryData());
	}

	public static function getByPreffix($id){
		$sql = "select * from ".self::$tablename." where detalle_cat = '$id' ";
		$query = Executor::doit($sql);
		return Model::one($query[0],new CategoryData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoryData());
	}

	public static function getSub($id){
		$sql = "select * from ".self::$tablename." where padre='$id'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoryData());
	}

	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where activo=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new CategoryData());
	}

}

?>