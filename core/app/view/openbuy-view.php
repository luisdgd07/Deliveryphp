<?php


?>
<section id="color-fondo">



<?php if(isset($_SESSION["client_id"])):
$client = ClientData::getById($_SESSION["client_id"]);
$iva = ConfigurationData::getByPreffix("general_iva")->val;
$coin = ConfigurationData::getByPreffix("general_coin")->val;
$ivatxt = ConfigurationData::getByPreffix("general_iva_txt")->val;
?>

<?php
$buy = BuyData::getByCode($_GET["codigo"]);
$products = BuyProductData::getAllByBuyId($buy->id);

?>
<div class="container">
<div class="row">

<div class="col-md-12">
<h3>Bienvenido, <?php echo $client->nombre." ".$client->apellidos; ?></h3>



	<a href="./index.php?view=client" class="btn btn-success"><i class="fa fa-chevron-left"></i> Regresar</a>
&nbsp;
	<a href="./invoice.php?codigo=<?php echo $buy->codigo;?>" target="_blank" class="btn btn-primary"><i class="fa fa-file-o"></i> Imprimir</a>
&nbsp;
	<!-- <a href="./index.php?view=comprobante" class="btn btn-warning"><i class="fa fa-camera"></i> Enviar Comprobante</a>

-->

<br></div>


</div>
</div>
<div class="container">
<div class="row">
	<div class="col-md-12">
<?php if($buy->status_id==1):?>
<p class="alert alert-warning">Operacion Pendiente</p>
<?php elseif($buy->status_id == 2 || $buy->status_id ==4 || $buy->status_id ==5 ):?>
<p class="alert alert-info"><?php echo StatusData::getById($buy->status_id)->nombre; ?></p>
<?php elseif($buy->status_id==3):?>
<p class="alert alert-danger">Operacion Cancelada</p>
<?php endif; ?>
	<h2> Compra #<?php echo $buy->id; ?></h2>
<?php if(count($products)>0):?>


	<div class="table-responsive">
<table class="table table-bordered">
	<thead>
		<th>Detalle</th>
		<th>Cantidad</th>
		<th>Unidad</th>
		<th>Codigo</th>
		<th>Producto</th>
		<th>Total</th>
	</thead>
	<?php foreach($products as $p):
$px = $p->getProduct();
	?>
	<tr>
		<td>

<center>

<a href="index.php?view=producto&product_id=<?php echo $px->id; ?>" target="_blank" class="btn btn-xs btn-success"><i class=""></i> Ver producto</a>

</center>

		</td>
		<td><?php echo $p->q; ?></td>
		<td><?php echo $px->getUnit()->nombre; ?></td>
		<td><?php echo $px->codigo; ?></td>
		<td><?php echo $px->nombre; ?></td>
		<td><?php echo $coin; ?> <?php echo number_format($px->precio*$p->q,2,".",","); ?></td>
	</tr>

	<?php endforeach; ?>
</table>

<?php
$total = $buy->getTotal();
?>
<div class="row">
<div class="col-md-5 col-md-offset-7">
	<div class="box box-primary">
	<table class="table table-bordered">
<br>

<tr>
<td><label>Cancelar:</label></td>
<td> <?php echo $coin."  ".$buy->total; ?></td></tr></table>
		</tr>

	</table>
	</div>
</div>
</div>


<div class="row">
<div class="col-md-5 col-md-offset-7">
<br>	

<?php if($buy->status_id==1):?>
<form method="post" action="index.php?action=cancelbuy">
<input type="submit" class="btn btn-danger btn-block btn3d" value="Cancelar Compra">
<input type="hidden" name="buy_id" value="<?php echo $buy->id; ?>">
</form>
<?php endif; ?>


</div>
</div>
</div>



<?php if($buy->paymethod_id==2):?>
	<h2>Datos del deposito bancario</h2>
<table class="table table-bordered">
	<thead>
		<th>Clave</th>
		<th>Valor</th>
	</thead>
	<tr>
		<td><?php echo ConfigurationData::getByPreffix("bank_titular")->label;?></td>
		<td><?php echo ConfigurationData::getByPreffix("bank_titular")->val;?></td>
	</tr>
	<tr>
		<td><?php echo ConfigurationData::getByPreffix("bank_name")->label;?></td>
		<td><?php echo ConfigurationData::getByPreffix("bank_name")->val;?></td>
	</tr>
	<tr>
		<td><?php echo ConfigurationData::getByPreffix("bank_account")->label;?></td>
		<td><?php echo ConfigurationData::getByPreffix("bank_account")->val;?></td>
	</tr>
	<tr>
		<td><?php echo ConfigurationData::getByPreffix("bank_card")->label;?></td>
		<td><?php echo ConfigurationData::getByPreffix("bank_card")->val;?></td>
	</tr>
</table>
<?php endif; ?>


<?php if($buy->paymethod_id==5):?>
	<h2>Datos del deposito Tigo Money</h2>



	<div class="table-responsive">

		
<table class="table table-bordered">
	<thead>
		<th>Clave</th>
		<th>Valor</th>
	</thead>
	<tr>
		<td><?php echo ConfigurationData::getByPreffix("tigo_titular")->label;?></td>
		<td><?php echo ConfigurationData::getByPreffix("tigo_titular")->val;?></td>
	</tr>
	<tr>
		<td><?php echo ConfigurationData::getByPreffix("tigo_ci")->label;?></td>
		<td><?php echo ConfigurationData::getByPreffix("tigo_ci")->val;?></td>
	</tr>
	<tr>
		<td><?php echo ConfigurationData::getByPreffix("tigo_account")->label;?></td>
		<td><?php echo ConfigurationData::getByPreffix("tigo_account")->val;?></td>
	</tr>
</table>
<?php endif; ?>




<?php endif; ?>


</div>
</div>
</div>
</div>


<?php endif; ?>


</section>