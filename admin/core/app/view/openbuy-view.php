<?php


$total = 0;
$buys =  BuyData::getAll();

$buy = BuyData::getById($_GET["buy_id"]);
$products = BuyProductData::getAllByBuyId($_GET["buy_id"]);
$client = ClientData::getById($buy->client_id);
$paymethod = $buy->getPaymethod();
$iva = ConfigurationData::getByPreffix("general_iva")->val;
$coin = ConfigurationData::getByPreffix("general_coin")->val;
$ivatxt = ConfigurationData::getByPreffix("general_iva_txt")->val;
?>
<div class="row">
	<div class="col-md-12">
	<h2> Compra #<?php echo $buy->id; ?> [<?php echo $buy->getStatus()->nombre; ?>]</h2>
	<h4>Cliente: <?php echo $client->getFullname(); ?></h4>
	<h4>Metodo de pago : <?php echo $paymethod->nombre; ?></h4>
<?php if(count($products)>0):?>
	<div class="box box-primary">
<table class="table table-bordered">
	<thead>
		<th>Ver</th>
		<th>Codigo</th>
		<th>Producto</th>
		<th>Total</th>
	</thead>
	<?php foreach($products as $p):
$px = $p->getProduct();
	?>
	<tr>
		

<td><a href="../index.php?view=producto&product_id=<?php echo $px->id; ?>" target="_blank" class="btn btn-xs btn-primary">Ver producto</a></td>


		<td><?php echo $px->codigo; ?></td>
		<td><?php echo $px->nombre; ?></td>
		<td><?php echo $coin; ?> <?php echo number_format($px->precio*$p->q,2,".",","); ?></td>
	</tr>

	<?php endforeach; ?>
</table>
</div>

<div class="row">
<div class="col-md-5 col-md-offset-7">
	<div class="box box-primary">
	<table class="table table-bordered">
	

	
		<tr>
<td><label>Cancelar:</label></td>
<td> <td><?php echo $coin." ".$buy->total; ?></td></td></tr></table>
		</tr>
	<?php else:?>
		<tr>
			<td>Total</td>  <td><?php echo $coin." ".$buy->total; ?></td>
		</tr>

	<?php endif; ?>
	</table>
	</div>
<br>
</div>
</div>
<div class="row">
<div class="col-md-12">
<!--
<form class="form-horizontal" role="form" method="post" action="index.php?action=changestatus">
  <div class="form-group">
    <label for="inputEmail1" class="col-md-3 control-label">Estado</label>
    <div class="col-md-6">
<select name="status_id" class="form-control">
<?php foreach(StatusData::getAll() as $s):?>
<option value="<?php echo $s->id; ?>" <?php if($s->id==$buy->status_id){ echo "selected"; }?>><?php echo $s->name; ?></option>
<?php endforeach; ?>
</select>
    </div>

    <div class="col-md-3">
      <input type="hidden" name="buy_id" value="<?php echo $buy->id; ?>">
      <button type="submit" class="btn btn-default">Cambiar Estado</button>

    </div>

  </div>
</form>
-->

</div>
</div>



	</div>
</div>





