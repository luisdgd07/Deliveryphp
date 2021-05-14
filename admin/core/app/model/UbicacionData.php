<?php
class UbicacionData {
    public static $tablename = "ubicacion";

    public function UbicacionData(){
        $this->latitud = "";
        $this->longitud = "";
        $this->enlace = "";
        $this->referencia = "";
        $this->tiempo=0;
        $this->costo=0;
        $this->distancia=" ";
    }

    public function addubi(){
        $sql = "INSERT into ".self::$tablename." (latitud,longitud,enlace,referencia,tiempo,costo,distancia) ";
        $sql .= "value (\"$this->latitud\",\"$this->longitud\",\"$this->enlace\",\"$this->referencia\",\"$this->tiempo\",\"$this->costo\",\"$this->distancia\")";
        Executor::doit($sql);
    }

    public static function getAll(){
        $sql = "select * from ".self::$tablename;
        $query = Executor::doit($sql);
        return Model::many($query[0],new CategoryData());
    } 
    
   /*SACAR LA ULTIMA UBICACION GUARDADA*/
     public static function ultimaUbicacion(){
        $sql = "select max(id_ubicacion) as maximo from ".self::$tablename;
         $query = Executor::doit($sql);
          $row =mysqli_fetch_array($query[0]);
           $ultimo=$row['maximo'];
      $ultimo=$ultimo;
      return $ultimo;
    }

    /*----------------------*/

    public function guardarUbi() {
        $host = $_SERVER["HTTP_HOST"]; //obtiene el dominio -> http://localhost:8080
        $url = $_SERVER["REQUEST_URI"]; // el resto de navegacion -> sgp/Views/ 
        //			echo "http://" . $host . $url;
        //se crea la url para pasarles a los distribuidores
        $link = "https://" . $host . $url . "mapa.php?lat=" . $this->latitud . "&lng=" . $this->longitud;


        $sql = "insert into ubicacion(latitud,longitud,enlace,referencia) "
                . "values('$this->latitud','$this->longitud','$link','$this->referencia')";

        if (parent::ejecutar($sql)) {
            return true;
        } else {
            return false;
        }
    }

    public function UltimaUbi() {
        $sql = "select * from ubicacion ORDER by Id_ubicacion DESC LIMIT 1";
        return parent::ejecutar($sql);
    }

}

// END CLASS
?>

