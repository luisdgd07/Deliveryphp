<?php

if(!empty($_POST)){
$client =  ClientData::getById($_POST["id"]);
$client->nombre = $_POST["nombre"];
$client->apellidos = $_POST["apellidos"];
$client->email = $_POST["email"];
$client->direccion = $_POST["direccion"];
$client->telefono = $_POST["telefono"];
$client->update();

if($_POST["password"]!=""){
@$client->password = crypt($_POST["password"]);
$client->update_passwd();

}


Core::redir("./?view=clients");
}

?>