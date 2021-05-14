<?php
ini_set('date.timezone','America/La_Paz');
class BuyData {
	public static $tablename = "pedidos";


	public function BuyData(){
		$this->title = "";
		$this->content = "";
		$this->image = "";
		$this->user_id = "";
		$this->is_public = "0";
		$this->creado =date("Y-m-d-H-i-s");
		
	}

	public function getStatus(){ return StatusData::getById($this->status_id);}
	public function getClient(){ return ClientData::getById($this->client_id);}
	public function getPaymethod(){ return PaymethodData::getById($this->paymethod_id);}

	public function add(){
		$sql = "insert into ".self::$tablename." (k,codigo,total,client_id,id_ubicacion,creado,paymethod_id,status_id) ";
		$sql .= "value (\"$this->k\",\"$this->codigo\",\"$this->total\",\"$this->client_id\",\"$this->id_ubicacion\",\"$this->creado\",\"$this->paymethod_id\",\"$this->status_id\")";
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

// partiendo de que ya tenemos creado un objecto BuyData previamente utilizamos el contexto
	public function update(){
		$sql = "update ".self::$tablename." set nombre=\"$this->name\" where id=$this->id";
		Executor::doit($sql);
	}

	public function cancel(){
		$sql = "update ".self::$tablename." set status_id=3 where id=$this->id";
		Executor::doit($sql);
	}


	public function change_status(){
		$sql = "update ".self::$tablename." set status_id=\"$this->status_id\" where id=$this->id";
		Executor::doit($sql);
	}

	public static function getById($id){
		$sql = "select * from ".self::$tablename." where id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BuyData());
	}

	public static function countByStatusId($id){
		$sql = "select count(*) as c from ".self::$tablename." where status_id=$id";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BuyData());
	}


	public static function getByCode($id){
		$sql = "select * from ".self::$tablename." where codigo=\"$id\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BuyData());
	}

	public static function getByPreffix($id){
		$sql = "select * from ".self::$tablename." where detalle_cat=\"$id\"";
		$query = Executor::doit($sql);
		return Model::one($query[0],new BuyData());
	}


	public static function getAll(){
		$sql = "select  pedidos.id,pedidos.k,pedidos.total,pedidos.client_id,pedidos.id_ubicacion,pedidos.status_id,pedidos.creado,pedidos.paymethod_id,codigo,ubicacion.enlace
FROM pedidos,ubicacion
WHERE pedidos.id_ubicacion=ubicacion.Id_ubicacion";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyData());
	}

	public static function getAllByDate($date){
		$sql = "select * from ".self::$tablename." where date(creado)=\"$date\"";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyData());
	}

	public static function getByRange($start,$end){
		$sql = "select * from ".self::$tablename." where (creado>=\"$start\" and creado<=\"$end\") order by creado desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyData());
	}


	public  function getTotal(){
		$products = BuyProductData::getAllByBuyId($this->id);
		$total=0;
		foreach ($products as $px) {
			$p = ProductData::getById($px->product_id);
			$total+=$p->precio*$px->q;
		}
		return $total;
	}

		public static function getGroupByDateOp($start,$end,$op){
  $sql = "select * from ".self::$tablename." where date(creado) >= \"$start\" and date(creado) <= \"$end\" and status_id=$op";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyData());
	}


	public static function getAllByClientId($id){
		$sql = "select * from ".self::$tablename." where client_id=$id order by creado desc";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyData());
	}


	public static function getPublics(){
		$sql = "select * from ".self::$tablename." where is_public=1";
		$query = Executor::doit($sql);
		return Model::many($query[0],new BuyData());
	}

}

?>