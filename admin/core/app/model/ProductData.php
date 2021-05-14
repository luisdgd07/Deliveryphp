<?php
class ProductData {
	public static $tablename = "productos";


	public function ProductData(){
		$this->title = "";
		$this->content = "";
		$this->imagen = "";
		$this->stock= "0";
		$this->id_categoria = "";
		$this->visible = "0";
		$this->fecha = "NOW()";
	}

	public function getUnit(){ return UnitData::getById($this->id_unidad);}

	public function add(){
		$sql = "insert into ".self::$tablename." (codigo,nombre,description,imagen,stock,precio,id_categoria,id_unidad,visible,existente,destacado,fecha) ";
		$sql .= "value (\"$this->codigo\",\"$this->nombre\",\"$this->description\",\"$this->imagen\",\"$this->stock\",\"$this->precio\",$this->id_categoria,$this->id_unidad,$this->visible,$this->existente,$this->destacado,$this->fecha)";
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

// partiendo de que ya tenemos creado un objecto ProductData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set codigo=\"$this->codigo\",nombre=\"$this->nombre\",description=\"$this->description\",stock=\"$this->stock\",precio=\"$this->precio\",existente=\"$this->existente\",visible=\"$this->visible\",destacado=\"$this->destacado\",id_unidad=\"$this->id_unidad\",id_categoria=\"$this->id_categoria\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_image(){
		$sql = "update ".self::$tablename." set imagen=\"$this->imagen\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getPublicsByCategoryId($id){
		$sql = "select * from ".self::$tablename." where id_categoria = '$id' order by fecha desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function get4News(){
		$sql = "select * from ".self::$tablename." where is_new=1 and visible=1 order by fecha desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function get4Offers(){
		$sql = "select * from ".self::$tablename." where is_offer=1 and visible=1 order by fecha desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getNews(){
		$sql = "select * from ".self::$tablename." where is_new=1 and visible=1 order by fecha desc limit 4";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}

	public static function getFeatureds(){
		$sql = "select * from ".self::$tablename." where destacado=1 and visible=1 order by fecha desc limit 6";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where nombre like '%$q%' or description like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductData());
	}


}

?>