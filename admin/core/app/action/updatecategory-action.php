<?php
if(!empty($_POST)){
	$cat =  CategoryData::getById($_POST["id_categoria"]);
	$cat->nombre = $_POST["nombre"];
	$cat->detalle_cat = $_POST["detalle_cat"];
	if(isset($_POST["activo"])){ $cat->activo=1;}else{$cat->activo=0;}
	$cat->update();

	Core::redir("index.php?view=categories");
}
?>
