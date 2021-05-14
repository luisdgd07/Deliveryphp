<?php
include('../ubicacion/clsUbicacion.php');

function set_ubicacion($id){
	$id_ubic= $id;
	$longitud=$_POST['txtLongitud'];
	$latitud=$_POST['txtLatitud'];
	$referencia=$_POST['txtRefencia'];
	$resp=false;

	$obj=new Ubicacion();
		if ($obj->set_ubicacion($id_ubic,$longitud,$latitud,$referencia)) {
		$resp=true;
		}

return $resp;

}





//insert ubicacion (PARA PRUEBAS INDIVIDUAL)
if (isset($_POST['boton']) && $_POST['boton']=="GUARDAR_UBICACION") {	
	$id_ubic=generar_id(1);
	$res=set_ubicacion($id_ubic);
	echo "<script> alert('exito'); </script>";	
}


?>