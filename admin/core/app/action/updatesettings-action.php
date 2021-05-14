<?php
$conf = new ConfigurationData();
// print_r($_POST);
if(isset($_SESSION["admin_id"]) && !empty($_POST)){
foreach ($_POST as $p => $k) {
	$conf->updateValFromName($p,$k);
}
Core::redir("./?view=settings");
}else{
Core::redir("./");

}

?>
