<?php


// print_r($_POST);
$users = ClientData::getByEmail($_POST["email"]);
$found = false;
// print_r($user);

foreach ($users as $user) {
	if(crypt($_POST["password"],$user->password )==$user->password){
		$_SESSION["client_id"]=$user->id;
		$found=true;
		// print "<script>alert('Bienvenido ... !');</script>";
	}

	
}

if($found){
	Core::redir("index.php?view=client");

}else{



Core::alert("Usuario o clave incorrecta");
Core::redir("index.php?view=clientaccess");


}

?>

