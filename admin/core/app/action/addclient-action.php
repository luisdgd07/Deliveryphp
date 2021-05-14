<?php

if(!empty($_POST)){
$client =  new ClientData();
$client->nombre = $_POST["nombre"];
$client->apellidos = $_POST["apellidos"];
$client->email = $_POST["email"];
$client->direccion = $_POST["direccion"];
@$client->password = crypt($_POST["password"]);
$client->telefono = $_POST["telefono"];
$client->add();
Core::redir("./?view=clients");
}

?>