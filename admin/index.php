
<?php
date_default_timezone_set('America/La_Paz');
?>




<!DOCTYPE html>
<html>
<link rel="icon" type="image/png" href="storage/icono.png" />
<head>
</head>
<body>



<script>


// });
// Push.create('Nuevo Pedido', {
//     body: '',
//     icon: '',
//     timeout: 10000,               // Timeout before notification closes automatically.
//     vibrate: [100, 100, 100],    // An array of vibration pulses for mobile devices.
//     onClick: function() {
//         // Callback for when the notification is clicked. 
//         // console.log(this);
//     }  
// });
</script>
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
//Core::$debug_sql = true; /** Jamas descomentar.jajajjja */

$lb = new Lb();
$lb->start();

?>


</body>
</html>