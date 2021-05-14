<?php

if(count($_POST)>0){
	$administrador=0;
	$desarrollador=0;
	if(isset($_POST["administrador"])){$administrador=1;}
	if(isset($_POST["desarrollador"])){$desarrollador=1;}
	$activo=0;
	if(isset($_POST["activo"])){$activo=1;}
	$user = UserData::getById($_POST["user_id"]);
	$user->nombre = $_POST["nombre"];
	$user->apellidos = $_POST["apellidos"];
	$user->nombre_usuario = $_POST["nombre_usuario"];
	$user->email = $_POST["email"];
	$user->administrador=$administrador;
	$user->desarrollador=$desarrollador;
	$user->activo=$activo;
	$user->update();

	if($_POST["password"]!=""){
		$user->password = sha1(md5($_POST["password"]));
		$user->update_passwd();
print "<script>alert('Se ha actualizado el password');</script>";

	}


print "<script>window.location='index.php?view=users';</script>";


}


?>