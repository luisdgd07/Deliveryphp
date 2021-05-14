<?php

if(isset($_POST["accept"]))
{
	$c= ClientData::getByEmail($_POST["email"]);
		if($c==null)
		{
			$client =  new ClientData();
			$client->nombre = $_POST["nombre"];
			$client->apellidos = $_POST["apellidos"];
			$client->email = $_POST["email"];
			$client->direccion = $_POST["direccion"];
			@$client->password = crypt($_POST["password"]);
			$client->telefono = $_POST["telefono"];
			$client->add();

						
Core::alert("Registrado correctamente.");
Core::redir("index.php?view=clientaccess");




}

else

{

Core::alert("Ya existe un usuario registrado con esta direccion email.");
Core::redir("./?view=register");

}

}
?>