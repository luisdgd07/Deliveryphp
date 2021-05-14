<?php
 
 if(file_exists('config.php')){
 	include 'config.php';
 }
 elseif(file_exists('../config.php')){
 	include '../config.php';
 }
class Database {
	public static $db;
	public static $con;
	function __construct(){
		$this->user=__USER__;
		$this->pass=__PASS__;
		$this->host=__HOST__;
		$this->ddbb=__DBNAME__;
		
	}

	function connect(){
		$con = new mysqli($this->host,$this->user,$this->pass,$this->ddbb);
		return $con;
	}

	public static function getCon(){
		if(self::$con==null && self::$db==null){
			self::$db = new Database();
			self::$con = self::$db->connect();
		}
		return self::$con;
	}
	
}
 

?>


