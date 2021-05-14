<?php
// print_r($_POST);
if(isset($_SESSION["admin_id"]) && !empty($_POST)){
	$conf = new ConfigurationData( array(
		'name' => $_POST['name'],
		'label' => $_POST['label'],
		'kind' => 1,
		'val' => $_POST['val'],
		'cfg_id' => 1
	) );
	$conf->add();
	Core::redir("./?view=settings");
}else{
	Core::redir("./");
}

?>
