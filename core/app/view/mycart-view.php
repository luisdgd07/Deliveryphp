
<?php 

    include('./resources/modal_ubicacion.php'); 


?>

<section id="color-fondo">



<?php
$total = 0;


$iva = ConfigurationData::getByPreffix("general_iva")->val;
$coin_symbol = ConfigurationData::getByPreffix("general_coin")->val;
$ivatxt = ConfigurationData::getByPreffix("general_iva_txt")->val;
?>
<div class="page-header">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <h2 class="entry-title"><span>Carrito de Compras</span></h2>
              <div class="breadcrumb">
                <span></span>
                <a href="./">Inicio</a>
                <span class="crumbs-spacer"><i class="fa fa-angle-double-right"></i></span>
                <span class="current">Carrito</span>
              </div>
            </div>
          </div>
        </div>
      </div>
      <br>
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





			<div class="table-responsive">


<table class="table table-bordered">
<thead>
	<th>Codigo</th>
	<th>Producto</th>
	<th>Cantidad</th>
	<th>Precio Unitario</th>
	<th>Total</th>
	<th></th>
</thead>
<?php 
foreach($_SESSION["cart"] as $s):?>
<?php $p = ProductData::getById($s["product_id"]); ?>
<tr>
<td><?php echo $p->codigo; ?></td>
<td><?php echo $p->nombre; ?></td>
<td style="width:100px;">
<form id="p-<?=$s["product_id"];?>">
<input type="hidden" name="p_id" value="<?=$s["product_id"];?>">
<input type="number" min="1" name="q" id="num-<?=$s["product_id"];?>" value="<?php echo $s["q"]; ?>" class="form-control">
</form>
<script>
	$("#num-<?=$s['product_id'];?>").change(function(){
		$.post("./?action=editcart",$("#p-<?=$s['product_id']?>").serialize()	,function(data){
			window.location = window.location;

		});
	});
</script>
</td>
<td><h4><?php echo $coin_symbol; ?> <?php echo $p->precio; ?></h4> </td>
<td><h4><?php echo $coin_symbol; ?> <?php echo $p->precio*$s["q"]; ?></h4> </td>
<td style="width:30px;"><a href="index.php?action=deletefromcart&product_id=<?php echo $p->id; ?>&href=cart" class="btn btn-danger btn-xs"><i class="fa fa-remove"></i></a></td>
<?php
$total += $s["q"]*$p->precio;
 endforeach; ?>
</tr>
</table>
</div>
	<table class="table table-bordered">
		<tr>
			<td>Cancelar</td><td><?php echo $coin_symbol; ?> <?php echo number_format($total,2,".",","); ?> </td> 
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

	</table>
<div class="row">


<div class="col-md-5">
   <!--
<form class="form-horizontal" role="form" method="post" action="./?action=usecoupon">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Cupon: </label>
    <div class="col-lg-10">
      <input type="text" name="coupon" class="form-control" value="<?php if(isset($_SESSION["coupon"])){ echo CouponData::getById($_SESSION["coupon"])->name; } ?>" id="inputEmail1" placeholder="Codigo de Cupon" >
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-success btn3d">Usar Cupon</button>
<?php if(isset($_SESSION["coupon"])):?>
<a href="./?action=cancelcoupon" class="btn btn-danger btn3d">Cancelar Cupon</a>
<?php endif;?>
    </div>
  </div>
-->
 
  


  </div>
</form>


<div class="col-md-5 col-md-offset-2">

	<table class="table table-bordered">
		
			<!--<?php if(isset($_SESSION["coupon"])):
$coupon = CouponData::getById($_SESSION["coupon"]);
		$discount = $coupon->val;
		$subtotal=$total+(($total*($iva/100)));
		$xdiscount=($subtotal )*($discount/100);
		?>
		<tr>
			<td>SubTotal</td><td><?php echo $coin_symbol; ?> <?php echo number_format($subtotal,2,".",","); ?></td>
		</tr>
		<tr>
			<td>Descuento por cupon:  <b><?php echo $coupon->name." ($coupon->val%)";?></b></td><td>Bs <?php echo number_format($xdiscount,2,".",","); ?></td>
		</tr>
		<tr>
			<td>Total</td><td><?php echo $coin_symbol; ?> <?php echo number_format($subtotal-$xdiscount,2,".",","); ?></td>
		</tr>
	<?php else:?>
		<tr>
			<td>Total</td><td><?php echo $coin_symbol; ?> <?php echo number_format($total+($total*($iva/100)),2,".",","); ?></td>
		</tr>

	<?php endif; ?> -->

	</table>
<br>
			<?php if(isset($_SESSION["client_id"])):?>
<form action="index.php?view=checkout" method="post">
<label>Metodo de pago</label>
<select class="form-control" required name="paymethod_id">
<?php foreach(PaymethodData::getActives() as $pay):?>
	<option value="<?php echo $pay->id; ?>"><?php echo $pay->nombre; ?></option>
<?php endforeach; ?>
</select><br>
<button class="btn btn-primary btn-block btn3d">Confirmar Comprar</button>
</form>
<?php endif; ?>
<br>
<a href="index.php?action=cleancart" class="btn btn-danger btn-block btn3d">Limpar Carrito</a>
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
<br>



<!---------------clase ubicacion---------------->



</section>

  

<script type="text/javascript">
	function addUbicacion(x,y,dir)
	{
		document.getElementById("latitudd").value=x+"";
		document.getElementById("longitudd").value=y+"";
		document.getElementById("enlace").value="https://maps.google.com/?q="+x+","+y;
		//document.getElementById("referencia").text=ref+" ";
	}
 
</script>

<script src="./resources/jquery.min.js "></script>
<script src="./resources/bootstrap.min.js "></script>
<!--<script src="./resources/pedido.js"></script>-->

<?php

 if(isset($_POST['']))
 {
 	registrarUbicacion();
 }
   function registrarUbicacion()
   {
   	 $ubi=new Ubicacion();
   	   $ubi->setLatitud($_POST['latitudd']);
            $ubi->setLongitud($_POST['longitudd']);
              $ubi->setEnlace($_POST['enlace']);
            $ubi->setReferencia($_POST['referencia']);
            if ($ubi->guardarUbicacionNueva()) {
                echo'<scrpt> alert("guardado")</script>';
                
            } else
                echo'<scrpt> alert("error")</script>';
   };

   /*//////////////////////////////////*/
    function accionPedido() {
        if ($_POST['latitudd'] && $_POST['longitudd'] && $_POST['referencia']) {
            $direccion = $_SESSION["dir"] . $_POST['referencia'];
            $ubi = new Ubicacion();
            $ubi->setLatitud($_POST['latitudd']);
            $ubi->setLongitud($_POST['longitudd']);
            $ubi->setReferencia($_POST['referencia']);

            if ($ubi->addUbi()) {
                //  echo"ubicacion guardada..!!";
                guardarPedido();
            } else
                echo"Error al guardar la ubicacion..!!";
        } else
            echo"Error no ha proporcionado una ubicacion!!!";
    }

    function modificarUbicacion() {
        $ubi = new Ubicacion();
        $registros = $ubi->UltimaUbi();
        $ubicacion = mysqli_fetch_object($registros);
        $ultima = $ubicacion->Id_ubicacion;
        $id = $_SESSION['id_usuario'];
        $nombre = $_SESSION['NOMBRE2'];
        $apellido = $_SESSION['APELLIDO'];
        $ci = $_SESSION['ci'];
        $telefono = $_SESSION['telefono'];
        $empresa = $_SESSION['empresa'];
        $email = $_SESSION['email'];
        $cli = new Cliente();
        $cli->setId_cliente($id);
        $cli->setNombre($nombre);
        $cli->setApellido($apellido);
        $cli->setCI($ci);
        $cli->setTelefono($telefono);
        $cli->setEmpresa($empresa);
        $cli->setEmail($email);
        $cli->setId_ubicacion($ultima);
        if ($cli->modificarCliente()) {
            //echo "ubicacion modificada";
            guardarPedido();
        } else {
            echo "error al modificar la ubicacio del cliente....";
        }
    }

    function guardarPedido() {
        $ubi = new Ubicacion();
        $registros = $ubi->UltimaUbi();
        $ubicacion = mysqli_fetch_object($registros);
        $ultima = $ubicacion->Id_ubicacion;
        $ped = new Pedido();
        $id_cli = $_SESSION['id_usuario'];
        $ped->setMonto_total($_POST['txtTotal']);
        $ped->setId_cliente($id_cli);
        $ped->setId_ubicacion($ultima);
        if ($ped->guardarPedido()) {
            // echo "pedido Guardado correctamente..!!!</font>";
            guardardetalle();
        } else {
            echo "Error al guardar el pedido..!</font>";
        }
    }


  

    function guardardetalle() {
        global $correcto;
        $x = false;
        $pedido = new Pedido();
        $detalle = new Detalle();
        $registros = $pedido->ObtenerUltimoPedido();
        $pedi = mysqli_fetch_object($registros);
        $ultimoPedido = $pedi->Id_pedido;
        if (!is_null($_SESSION['carrito'])) {
            $articulos = $_SESSION['carrito'];
            foreach ($articulos as $a) {
                if ($detalle->guardarDetalleP($ultimoPedido, $a->Id_producto, $a->cantidad)) {
                    echo "/*$a->cantidad*/";
                    $correcto = true;
                }
            }
            unset($_SESSION['carrito']);
            if (isset($_SESSION['lat'])) {
                unset($_SESSION['lat']);
            }
            if (isset($_SESSION['lng'])) {
                unset($_SESSION['lng']);
            }
            if (isset($_SESSION['dir'])) {
                unset($_SESSION['dir']);
            }
        }
    }
  ?>