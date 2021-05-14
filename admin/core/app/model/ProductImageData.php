<?php
class ProductImageData {
	public static $tablename = "producto_imagen";


	public function ProductImageData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->created_at = "NOW()";
	}

	public function getProduct() { return ProductData::getById($this->product_id);}

	public function add(){
		$sql = "insert into ".self::$tablename." (titulo,description,src,product_id) ";
		$sql .= "value (\"$this->titulo\",\"$this->description\",\"$this->src\",$this->product_id)";
		return Executor::doit($sql);
	}

	public static function delById($id){
		$sql = "delete from ".self::$tablename." where id=$id";
		Executor::doit($sql);
	}
	public function del(){
		$sql = "delete from ".self::$tablename." where id=$this->id";
		Executor::doit($sql);
	}

// partiendo de que ya tenemos creado un objecto ProductImageData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set titulo=\"$this->titulo\",description=\"$this->description\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductImageData());
	}

	public static function getByPreffix($id){
		$sql = "select * from ".self::$tablename." where short_name=\"$id\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new ProductImageData());
	}


	public static function getAll(){
		$sql = "select * from ".self::$tablename;
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductImageData());
	}

	public static function getAllByProductId($id){
		$sql = "select * from ".self::$tablename." where product_id=$id";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductImageData());
	}

	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where is_public=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new ProductImageData());
	}

}

?>