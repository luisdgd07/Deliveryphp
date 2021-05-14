<?php

if(count($_POST)>0){
	$administrador=0;
	$desarrollador=0;
	if(isset($_POST["administrador"])){$administrador=1;}
	if(isset($_POST["desarrollador"])){$desarrollador=1;}
	$user = new UserData();
	$user->nombre = $_POST["nombre"];
	$user->apellidos = $_POST["apellidos"];
	$user->nombre_usuario = $_POST["nombre_usuario"];
	$user->email = $_POST["email"];
	$user->administrador=$administrador;
	$user->desarrollador=$desarrollador;
	$user->password = sha1(md5($_POST["password"]));
	$user->add();

print "<script>window.location='index.php?view=users';</script>";


}

?>