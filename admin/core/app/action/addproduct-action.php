<?php
if($_POST["precio"]<0){ Core::alert("No puedes agregar valores negativos."); Core::redir("./?view=newproduct");}
else{
// print_r($_POST);
$product =  new ProductData();
foreach ($_POST as $k => $v) {
	$product->$k = $v;
	# code...

}
$alphabeth ="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWYZ1234567890_-";
$code = "";
for($i=0;$i<11;$i++){
    $code .= $alphabeth[rand(0,strlen($alphabeth)-1)];
}
        $product->short_name= $code;


    		$handle = new Upload($_FILES['imagen']);
        	if ($handle->uploaded) {
        		$url="storage/products/";
            	$handle->Process($url);

                $product->imagen = $handle->file_dst_name;
    		}
if(isset($_POST["visible"])) { $product->visible=1; }else{ $product->visible=0; }
if(isset($_POST["existente"])) { $product->existente=1; }else{ $product->existente=0; }
if(isset($_POST["destacado"])) { $product->destacado=1; }else{ $product->destacado=0; }

// $product->name = $_POST["name"];

$product->add();

Core::redir("index.php?view=products");
}
?>