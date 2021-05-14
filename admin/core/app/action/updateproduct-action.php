<?php
if($_POST["precio"]<0){ Core::alert("No puedes agregar valores negativos."); Core::redir("./?view=products");}
else{
// print_r($_POST);
$product =  new ProductData();
foreach ($_POST as $k => $v) {
	$product->$k = $v;
	# code...

}

////////////////////////////////////// / / / / / / / / / / / / / / / / / / / / / / / / /
$handle = new Upload($_FILES['imagen']);
if ($handle->uploaded) {
	$url="storage/products/";
	$handle->Process($url);

    $product->imagen = $handle->file_dst_name;
    $product->update_image();
}
////////////////////////////////////// / / / / / / / / / / / / / / / / / / / / / / / / /

if(isset($_POST["visible"])) { $product->visible=1; }else{ $product->visible=0; }
if(isset($_POST["existente"])) { $product->existente=1; }else{ $product->existente=0; }
if(isset($_POST["destacado"])) { $product->destacado=1; }else{ $product->destacado=0; }



$product->name = $_POST["nombre"];

 $product->update();
$_SESSION["product_updated"]= 1;
Core::redir("index.php?view=editproduct&product_id=".$_POST["id"]);
}
?>