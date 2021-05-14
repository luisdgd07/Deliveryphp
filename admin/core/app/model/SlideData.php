<?php
class SlideData {
	public static $tablename = "slider";


	public function SlideData(){
		$this->titulo = "";
		$this->content = "";
		$this->image = "";
		$this->link = "";
		$this->category_id = "";
		$this->visible = "0";
		$this->creado = "NOW()";
	}

	public function add(){
		$sql = "insert into ".self::$tablename." (titulo,image,visible,creado) ";
		$sql .= "value (\"$this->titulo\",\"$this->image\",$this->visible,$this->creado)";
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

// partiendo de que ya tenemos creado un objecto SlideData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set titulo=\"$this->titulo\",visible=\"$this->visible\" where id=$this->id";
		Executor::doit($sql);
	}

	public function update_image(){
		$sql = "update ".self::$tablename." set image=\"$this->image\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new SlideData());
	}



	public static function getAll(){
		$sql = "select * from ".self::$tablename." order by creado desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SlideData());
	}

	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where  visible=1 order by creado desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SlideData());
	}

	public static function getLike($q){
		$sql = "select * from ".self::$tablename." where titulo like '%$q%' or content like '%$q%'";
		$query = Executor::doit($sql);
		return Model::many($query[0],new SlideData());
	}


}

?>