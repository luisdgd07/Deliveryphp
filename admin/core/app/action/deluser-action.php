<?php
if(isset($_SESSION["admin_id"])){
$admin = UserData::getById($_SESSION["admin_id"]);
$user = UserData::getById($_GET["id"]);

if($user->id!=$admin->id){
	$user->del();

Core::alert("usuario eliminado");
}

else{
	
	Core::alert("No te puedes eliminar a ti mismo");
}

Core::redir("index.php?view=users");

}
?>