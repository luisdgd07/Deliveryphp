
<section id="color-fondo">


<?php if(isset($_SESSION["client_id"])):
$client = ClientData::getById($_SESSION["client_id"]);
$coin_symbol = ConfigurationData::getByPreffix("general_coin")->val;
$iva = ConfigurationData::getByPreffix("general_iva")->val;
?>
<div class="container">
<div class="row">

<div class="col-md-12">
<h3>Bienvenido, <?php echo $client->nombre." ".$client->apellidos; ?></h3>
</div>

</div>
</div>
<?php

$buys =  BuyData::getAll();



?>
<?php

$buys = BuyData::getAllByClientid($_SESSION["client_id"]);


?>
<div class="container">
<div class="row">
	<div class="col-md-12">
	<h2>Mis Compras</h2>
<?php if(count($buys)>0):?>




	<div class="table-responsive">
<table class="table table-bordered">
	<thead>
		<th>Detalles</th>
		<th>Compra</th>
		
		<th>Total</th>
		<th>Estado</th>
		<th>Metodo de pago</th>
		<th>Fecha</th>
	</thead>
	<?php foreach($buys as $buy):
	$discount = 0;
	?>
	<tr>
		<td>
		
<center>

			<a href="index.php?view=openbuy&codigo=<?php echo $buy->codigo;?>" class="btn btn-xs btn-info"><i class=""></i> Detalles</a>
                
&nbsp;&nbsp;




<a href="./invoice.php?codigo=<?php echo $buy->codigo;?>" class="btn btn-xs btn-primary" target="_blank" ><i class=""></i> Imprimir</a>

</center>
		</td>
		<td>#<?php echo $buy->id; ?></td>
		
		
		<td><?php echo $coin_symbol."  ".$buy->total; ?></td>
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

</section>