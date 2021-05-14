
<?php
date_default_timezone_set('America/La_Paz');
?>

<!DOCTYPE html>
<html>

<head>
  
<title>ROCA CHAVEZ</title>

<link rel="icon" type="image/png" href="admin/storage/icono.png" />

<meta http-equiv=”arsystel” content=”es”/>


<meta name=“keywords” lang=“es” >


<meta name=“author” content=“Norah Zelaya Luisaga” />



<meta name="google-site-verification" content="ohcyVEk3xVN3FH4QD9VumO1YlCFHhjYQ8LZb5iXnfW4" />

</head>


<meta name="google-site-verification" content="ohcyVEk3xVN3FH4QD9VumO1YlCFHhjYQ8LZb5iXnfW4" />


</head>


<body>





<?php


define("ROOT", dirname(__FILE__));

$debug= false;
if($debug){
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);
}

include "core/autoload.php";

ob_start();
session_start();
Core::$root="";

// si quieres que se muestre las consultas SQL debes decomentar la siguiente linea
Core::$debug_sql = false;

$lb = new Lb();
$lb->start();

?>


</body>


</html>