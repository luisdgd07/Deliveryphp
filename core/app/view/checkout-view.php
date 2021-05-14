<?php 
  include('./resources/modal_ubicacion.php'); 

  ?>
<section id="color-fondo">

<?php
$total = 0;
$pm  = PaymethodData::getById($_POST["paymethod_id"]);
$iva = ConfigurationData::getByPreffix("general_iva")->val;
$coin_symbol = ConfigurationData::getByPreffix("general_coin")->val;
$ivatxt = ConfigurationData::getByPreffix("general_iva_txt")->val;

?>
<div class="container">
	<div class="row">

		<div class="col-md-12">
			<?php if(!isset($_SESSION["client_id"])):?>
				<p class="alert alert-danger">Debes registrarte e iniciar sesion para proceder.</p>
			<?php endif; ?>
		</div>
</div>

	<div class="row">

		<div class="col-md-12">
			<?php if(isset($_SESSION["cart"]) && count($_SESSION["cart"]>0)):?>
		<h2>Confirmacion de compra</h2>
		<h4>Metodo de pago: <b><?php echo $pm->nombre; ?></b></h4>

<script src="sweet-alert.min.js"></script>

		<div class="table-responsive">

<table class="table table-bordered">
<thead>
	<th>Codigo</th>
	<th>Producto</th>
	<th>Cantidad</th>
	<th>Precio Unitario</th>
	<th>Total</th>
</thead>
<?php 
foreach($_SESSION["cart"] as $s):?>
<?php $p = ProductData::getById($s["product_id"]); ?>
<tr>
<td><?php echo $p->codigo; ?></td>
<td><?php echo $p->nombre; ?></td>
<td style="width:100px;">
<?php echo $s["q"]; ?>
</td>
<td><h4><?php echo $coin_symbol; ?> <?php echo $p->precio; ?></h4> </td>
<td><h4><?php echo $coin_symbol; ?> <?php echo $p->precio*$s["q"]; ?></h4> </td>
<?php
$total += $s["q"]*$p->precio;
 endforeach; ?>
</tr>
</table>

</div>


<div class="row">
<div class="col-md-5">






</div>
<div class="col-md-5 col-md-offset-2">

	<div class="table-responsive">

	<!--</form><table class="table table-bordered">
		<tr>
			<td>Cancelar</td><td><?php echo $coin_symbol; ?> <?php echo number_format($total,2,".",","); ?></td>
		</tr>
		
		<?php if(isset($_SESSION["coupon"])):
$coupon = CouponData::getById($_SESSION["coupon"]);
		$discount = $coupon->val;
		
		$xdiscount=($subtotal )*($discount/100);
		?>
		<tr>
			<td>SubTotal</td><td><?php echo $coin_symbol; ?> <?php echo number_format($subtotal,2,".",","); ?></td>
		</tr>
		<tr>
			<td>Descuento: <b><?php echo $coupon->name." ($coupon->val%)";?></b></td><td><?php echo $coin_symbol; ?> <?php echo number_format($xdiscount,2,".",","); ?></td>
		</tr>
		
	<?php else:?>
		

	<?php endif; ?>

	</table>-->

<?php if(isset($_SESSION["client_id"])):?>
<form action="index.php?action=buy" method="post">
	<table class="table table-bordered">
	<tr>

	<td><label>Cancelar:</label></td>
<td><input type="text" name="totalPed" id="totalPed" readonly="readonly" value="<?php echo $total ?>"></td></tr></table>
	 <!--FORMULARIO UBICACION-->    
<!--<form  method="post" action="index.php?action=addUbicacion">-->


<!--


<div class="col-md-10 col-md-offset-2">

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Latitud: </label>
    <div class="col-lg-8">
    <input class="form-control" type="text" required="" name="latitudd" id="latitudd" value="">
    </div>
  </div>
  <br>
  <br>
   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Longitud: </label>
    <div class="col-lg-8">
    <input class="form-control" type="text" required="" name="longitudd" id="longitudd" value="">
    </div>
  </div>
 <br>
  <br>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Enlace: </label>
    <div class="col-lg-8">
    <input class="form-control" type="text" required="" name="enlace" id="enlace" value="">
    </div>
  </div>
  <br>
  <br>
   <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Referencia: </label>
    <div class="col-lg-8">
    <input class="form-control" type="text" required="" name="descrip" id="descrip" value="">
    </div>
  </div>
<br>
<br>
<div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tiempo:</label>
    <div class="col-lg-8">
    <input type="text" required="" name="texttiempoextra" id="texttiempoextra" value="" readonly="readonly">
    </div>
  </div>
<br>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Costo Por envio: </label>
    <div class="col-lg-8">
    <input type="text" required="" name="montoextra" id="montoextra" value="">
    </div>
  </div>
<br>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Distancia:</label>
    <div class="col-lg-8">
    <input type="text" required="" name="textdistancia" id="textdistancia" value="">
    </div>
  </div>

<br>
<br>
  
  <center>

  <button type="button" class="btn btn-success btn3d" data-toggle="modal" data-target="#ubicacion">agrega ubicacion</button>

  </center>


</div>

<!--</form>-->
<!--FIN FORMULARIO UBICACION-->



<div class="panel panel-primary">
				
				<div class="panel-body">

  <div class="form-group">
  	<br>
    <label for="inputEmail1" class="col-lg-2 control-label">Latitud: </label>
    <div class="col-lg-10">
      <input type="text" required="" name="latitudd" id="latitudd" class="form-control" placeholder="Latitud">
      <br>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Longitud: </label>
    <div class="col-lg-10">
      <input type="text" required="" name="longitudd" id="longitudd" class="form-control" placeholder="Longitud">
      <br>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Enlace: </label>
    <div class="col-lg-10">
      <input type="text" name="enlace" id="enlace" class="form-control" required="" placeholder="Enlace">
      <br>
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Ref: </label>
    <div class="col-lg-10">
      <input type="text" name="descrip" id="descrip" class="form-control" required="" placeholder="Referencia Ej. Color de Casa">
      <br>
    </div>
  </div>

  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Tiempo: </label>
    <div class="col-lg-10">
      <input type="text" name="texttiempoextra" id="texttiempoextra" value="" readonly="readonly" required="" class="form-control"  placeholder="Tienpo de llegada">
      <br>
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Costo: </label>
    <div class="col-lg-10">
      <input type="text" required="" name="montoextra" id="montoextra" class="form-control" placeholder="costo de envio" readonly="readonly">
      <br>
    </div>
  </div>

    <div class="form-group">
    <label for="inputPassword1" class="col-lg-2 control-label">Distancia: </label>
    <div class="col-lg-10">
      <input type="text" required="" name="textdistancia" id="textdistancia" class="form-control" 
      placeholder="Distancia del envio" readonly="readonly">
      <br>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      

      
    </div>
  </div>

      
				</div>
			</div>



<button type="button" class="btn btn-block btn btn-success btn3d" data-toggle="modal" data-target="#ubicacion" ">Agrega Ubicacion</button>

<br>

<input type="hidden" class="form-control" required name="paymethod_id" value="<?php echo $_POST["paymethod_id"];?>">
<button onclick="Pedido()" class="btn btn-primary btn-block btn3d" >Proceder a Comprar</button>
</form>
<?php endif; ?>
<br>
<a href="index.php?view=mycart" class="btn btn-warning btn-block btn3d">Regresar al Carrito</a>
<br><a href="./index.php?action=cleancart" class="btn btn-danger btn-block btn3d">Cancelar y Eliminar</a>
</div>
</div>
</div>



			<?php else:
			?>
				<div class="jumbotron">
				<h2>No hay productos</h2>
				<p>No ha agregado productos al carrito.</p>
				</div>
			<?php endif; ?>
		</div>
	</div>
</div>

</section>

<script type="text/javascript">
	function addUbicacion(x,y,dir)
	{
		document.getElementById("latitudd").value=x+"";
		document.getElementById("longitudd").value=y+"";
		document.getElementById("enlace").value="https://maps.google.com/?q="+x+","+y;
		//document.getElementById("referencia").text=ref+" ";
		/////metodo de distancia
		var lat1 =-17.334112; //latitud del negocio
        var lon1 =-63.256649;  //longitud de negocio 
        var lat2 =x;   //latitud del cliente
        var lon2 =y;   // longitud del cliente


        

var Distancia = Dist(lat1, lon1, lat2, lon2);   //Retorna numero en Km
//alert(Distancia);
function Dist(lat1, lon1, lat2, lon2)
  {
  rad = function(x) {return x*Math.PI/180;}

  var R     = 6378.137;                          //Radio de la tierra en km
  var dLat  = rad( lat2 - lat1 );
  var dLong = rad( lon2 - lon1 );

  var a = Math.sin(dLat/2) * Math.sin(dLat/2) + Math.cos(rad(lat1)) * Math.cos(rad(lat2)) * Math.sin(dLong/2) * Math.sin(dLong/2);
  var c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
  var d = R * c;

  //return d.toFixed(3);                      //Retorna tres decimales
  var precioextr=Math.round(d*2);
  var dist=d*1000;
  var distentero=Math.round(dist);
  
  var tprepa=10;
  var trecorrido=((distentero/30000)*60);
  var timetotal=Math.round(trecorrido+tprepa)
  //alert(timetotal);
document.getElementById("montoextra").value =precioextr;
document.getElementById("texttiempoextra").value =timetotal;
document.getElementById("textdistancia").value =distentero;

  setTimeout(function(){  }, 2000); swal('El Pedido llegara en '+timetotal+' minutos,'+' Por la Distancia se aumentara '+precioextr+' Bs al monto total' ,'','info');  //esto es una alerta que muestra en un modal todo
}

	}
 
</script>



