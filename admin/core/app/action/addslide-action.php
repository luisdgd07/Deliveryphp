<?php
// print_r($_POST);
$product =  new SlideData();
foreach ($_POST as $k => $v) {
	$product->$k = $v;
	# code...
}
    		$handle = new Upload($_FILES['image']);
        	if ($handle->uploaded) {
        		$url="storage/slides/";
            	$handle->Process($url);

                $product->image = $handle->file_dst_name;
    		}
if(isset($_POST["visible"])) { $product->visible=1; }else{ $product->visible=0; }

// $product->name = $_POST["name"];

$product->add();

 Core::redir("index.php?view=slider");

?>