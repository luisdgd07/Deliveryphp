<?php if(isset($_SESSION["client_id"])):
$client = ClientData::getById($_SESSION["client_id"]);
$coin_symbol = ConfigurationData::getByPreffix("general_coin")->val;

?>
<div class="container">
<div class="row">

<div class="col-md-12">
<h3>Bienvenido, <?php echo $client->nombre." ".$client->apellidos; ?></h3>
</div>

</div>
</div>
<?php

$buys = BuyData::getAllByClientid($_SESSION["client_id"]);


?>
<div class="container">
<div class="row">
	<div class="col-md-12">
	<h2>Mis Compras</h2>
<?php if(count($buys)>0):?>
<table class="table table-bordered">
	<thead>
		<th></th>
		<th>Compra</th>
		<th>Subtotal</th>
		<th>Descuento</th>
		<th>Total</th>
		<th>Estado</th>
		<th>Metodo de pago</th>
		<th>Fecha</th>
	</thead>
	<?php foreach($buys as $buy):
	$discount = 0;
	?>
	<tr>
		<td><a href="index.php?view=openbuy&code=<?php echo $buy->code; ?>" class="btn btn-default btn-xs">Detalles</a></td>
		<td>#<?php echo $buy->id; ?></td>
		<td><?php echo $coin_symbol; ?> <?php echo number_format($buy->getTotal(),2,".",","); ?></td>
		<td><?php echo $coin_symbol; ?>
			<?php if($buy->coupon_id!=null){
				$coupon = CouponData::getById($buy->coupon_id);
				$discount = $coupon->val;
				echo number_format($discount,2,".",",");
				}else{
				echo number_format($discount,2,".",",");

				}
			?>
		</td>
		<td><?php echo $coin_symbol; ?> <?php echo number_format($buy->getTotal()-$discount,2,".",","); ?></td>
		<td><?php echo $buy->getStatus()->nombre; ?></td>
		<td><?php echo $buy->getPaymethod()->nombre; ?></td>
		<td><?php echo $buy->creado; ?></td>
	</tr>

	<?php endforeach; ?>
</table>
<?php else:?>
	<div class="jumbotron">
	<h2>No hay compras</h2>

	</div>
<?php endif; ?>
	</div>
</div>
</div>



<?php endif; ?>
