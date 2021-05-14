<?php

if(!empty($_POST)){
$ubi =  new UbicacionData();
$a=$_POST["descrip"];
$ubi->latitud = $_POST["latitudd"];
$ubi->longitud = $_POST["longitudd"];
$ubi->enlace = $_POST["enlace"];
$ubi->referencia = $_POST["descrip"];
$ubi->tiempo=$_POST['texttiempoextra'];
$ubi->costo=$_POST['montoextra'];
$ubi->distancia=$_POST['textdistancia'];
$ubi->addubi();
echo '<script type="text/javascript">alert("guardado     '.$a.'");</script>';
Core::redir("./?view=mycart");

}



?>