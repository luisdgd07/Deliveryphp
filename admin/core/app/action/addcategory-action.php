<?php

$cat =  new CategoryData();
$cat->nombre = $_POST["nombre"];
$cat->detalle_cat = $_POST["detalle_cat"];
$cat->padre = $_POST["padre"];
if(isset($_POST["activo"])){ $cat->activo=1;}else{$cat->activo=0;}
$cat->add();

Core::redir("index.php?view=categories");

?>