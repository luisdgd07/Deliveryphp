
<section id="color-fondo">

<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<head>

</head>
<body>
  
<?php
	$title = ConfigurationData::getByPreffix('general_title_full')->val;
	$address = ConfigurationData::getByPreffix('general_address')->val;
	$msj = ConfigurationData::getByPreffix('general_msj_generic')->val;
	$num_wsp1 = ConfigurationData::getByPreffix('general_num_whatsapp1')->val;
	$link_wsp1 = ConfigurationData::getByPreffix('general_link_whatsapp1')->val;
	$num_wsp2 = ConfigurationData::getByPreffix('general_num_whatsapp2')->val;
	$link_wsp2 = ConfigurationData::getByPreffix('general_link_whatsapp2')->val;
	$num_wsp3 = ConfigurationData::getByPreffix('general_num_whatsapp3')->val;
	$link_wsp3 = ConfigurationData::getByPreffix('general_link_whatsapp3')->val;
	$only_call1 = ConfigurationData::getByPreffix('general_num_onlycall1')->val;
	$only_call2 = ConfigurationData::getByPreffix('general_num_onlycall2')->val;
	$email = ConfigurationData::getByPreffix('general_email')->val;
	$website_name1 = ConfigurationData::getByPreffix('general_website_name1')->val;
	$website_link1 = ConfigurationData::getByPreffix('general_website_link1')->val;
	$website_name2 = ConfigurationData::getByPreffix('general_website_name2')->val;
	$website_link2 = ConfigurationData::getByPreffix('general_website_link2')->val;
	$website_name3 = ConfigurationData::getByPreffix('general_website_name3')->val;
	$website_link3 = ConfigurationData::getByPreffix('general_website_link3')->val;
	$code_map = ConfigurationData::getByPreffix('general_map_code')->val;
?>



<div class="container">
<div class="row">
<div class="col-md-10 col-md-offset-2">
		<h3><?php echo $title; ?></h3>
		<br>
<h3>Contactos:</h3>

</br>

<div class="form-group col-md-6">
<?php if( strlen($address) > 0 ): ?>
<h4>Direccion:</h4>
<p>
	<?php echo $address; ?>
</p>
<?php endif;?>
</div>

<div class="form-group col-md-6">
<h4>Celular:</h4>
<?php if( strlen($msj) > 0 ): ?>
<p><?php echo $msj; ?></p>
<?php endif;?>
<?php if( strlen($num_wsp1) > 1 ): ?>
<li>
	<i class="fa fa-whatsapp pr-10"></i> Enviar Whatsapp : 
	<a target="_blank" href="<?php echo $link_wsp1;?>"><?php echo $num_wsp1;?></a>
</li>
<?php endif;?>
<?php if( strlen($num_wsp2) > 1 ): ?>
<li>
	<i class="fa fa-whatsapp pr-10"></i> Enviar Whatsapp : 
	<a target="_blank" href="<?php echo $link_wsp2;?>"><?php echo $num_wsp2;?></a>
</li>
<?php endif;?>
<?php if( strlen($num_wsp3) > 1 ): ?>
<li>
	<i class="fa fa-whatsapp pr-10"></i> Enviar Whatsapp : 
	<a target="_blank" href="<?php echo $link_wsp3;?>"><?php echo $num_wsp3;?></a>
</li>
<?php endif;?>
<?php if( strlen($only_call1) > 1 ): ?>
<li>
	<i class="fa fa-whatsapp pr-10">
	</i>Solo llamadas <?php echo $only_call1; ?>
</li>
<?php endif;?>
<?php if( strlen($only_call2) > 1 ): ?>
<li>
	<i class="fa fa-whatsapp pr-10">
	</i>Solo llamadas <?php echo $only_call2; ?>
</li>
<?php endif;?>

</div>

<div class="form-group col-md-6">
<?php if( strlen($email) > 1 ): ?>
	<h4>Correo Electronico:</h4>
	<p><?php echo $email; ?></p>
<?php endif;?>
</div>

<div class="form-group col-md-6">
<?php if( strlen($website_name1)+strlen($website_name2)+strlen($website_name3) > 3 ): ?>
	<h4>Sitios Web oficiales:</h4>
	<?php if( strlen($website_name1)> 1 ): ?>
 		<a href="<?php echo $website_link1;?>"><?php echo $website_name1;?></a>
	<?php endif;?>
	<?php if( strlen($website_name2)> 1 ): ?>
 		<a href="<?php echo $website_link2;?>"><?php echo $website_name2;?></a>
	<?php endif;?>
	<?php if( strlen($website_name3)> 1 ): ?>
 		<a href="<?php echo $website_link3;?>"><?php echo $website_name3;?></a>
	<?php endif;?>
<?php endif;?>

</div>
 


<br>

<div class="form-group">
	<div class="col-sm-10">
	<h4>Mapa de la ubicacion:</h4>
<iframe src="<?php echo $code_map; ?>" height="480px" width="100%" frameborder="0" style="border:0" allowfullscreen></iframe>

</div>
</div>


</div>
</div>




</body>
</html>
</br>
</section>
