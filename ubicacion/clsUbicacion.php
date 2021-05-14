<?php
include_once('./core/controller/Database.php');
class UbicacionData {
    public static $tablename = "ubicacion";

    public function UbicacionData(){
        $this->latitud = "";
        $this->longitud = "";
        $this->enlace = "";
        $this->referencia = "";
    }

    public function addUbi(){
        $sql = "insert into ".self::$tablename." (latitud,longitud,enlace,referencia) ";
        $sql .= "value (\"$this->latitud\",\"$this->longitud\",\"$this->enlace\",\"$this->referencia)";
        Executor::doit($sql);
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

