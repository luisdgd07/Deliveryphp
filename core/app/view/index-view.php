<!-- cabezera -->


<link rel="stylesheet" href="css/span.css" />

<?php 
//$coin_symbol = ConfigurationData::getByPreffix("general_coin")->val;
//$img_default = ConfigurationData::getByPreffix("general_img_default")->val;
$coin_symbol = "$";
$cnt=0;
$slides = SlideData::getPublics();
$destacado = ProductData::getFeatureds();
?>

<center>
     <input type="checkbox" id="cerrar">
      <label for="cerrar" id="btn-cerrar"> X </label>
      <div class="ventana">   
        <div >
          
          <img src="images/imagen.jpg" alt="">
        </div>
      </div>
</center>
<section id="color-fondo">

  <div class="container ">

  <div class="row">

  <div class="col-md-12">
<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
        <?php if(count($slides)>0):?>

    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
<?php foreach($slides as $s):?>
        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $cnt; ?>" class="<?php if($cnt==0){ echo "active";}?>"></li>
<?php $cnt++; endforeach; ?>

      </ol>

      <!-- Wrapper for slides -->
      <div class="carousel-inner">
<?php $cnt=0; foreach($slides as $s):
$url = "admin/storage/slides/".$s->image;
?>

        <div class="item <?php if($cnt==0){ echo "active"; }?>">
          <img src="<?php echo $url; ?>" alt="...">
          <div class="carousel-caption">
            <h2><?php echo $s->titulo; ?></h2>
          </div>
        </div>
<?php $cnt++; endforeach; ?>
<!--
        <div class="item">
          <img src="http://placehold.it/800x300" alt="...">
          <div class="carousel-caption">
            <h2>Heading</h2>
          </div>
        </div>
        -->
      </div>

      <!-- Controls -->
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
    <br>
  <?php endif; ?>

<!-- - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -->
<?php

$nproducts = count($destacado);
$filas = $nproducts/3;
$extra = $nproducts%3;
if($filas>1&& $extra>0){ $filas++; }
$n=0;
?>
<?php if(count($destacado)>0):?>
<a href="./"><div style="background:#ff072c;font-size:25px;color:white;padding:5px;">Productos Destacados</div></a>

<br>
<?php for($i=0;$i<$filas;$i++):?>
  <div class=”row”>
<?php for($j=0;$j<3;$j++):
$p=null;
if($n<$nproducts){
$p = $destacado[$n];
}
?>
<?php if($p!=null):
$img = "admin/storage/products/".$p->imagen;
if($p->imagen==""){
  $img=$img_default;
}
?>


<!--
col-xs-4 col-sm-4 col-md-4  first-in-line first-item-of-tablet-line"
col-xs-5
-->




  <div class="col-md-4 col-sm-6" >

<!-- modal-content -->
<!-- productos -->

<div class="modal-producto">

   <a href="index.php?view=producto&product_id=<?php echo $p->id; ?>" class = ''>

 <center>   





<img id="myImg" src="<?php echo $img; ?>" alt="Snow" style="width:230px;height:230px;">




 </center>


<center>


  <h4 class="titulos" ><?php echo $p->nombre; ?></h4>

 </a>
  
<h3 class="precios cursor"> <?php echo $coin_symbol." ".number_format($p->precio,2,".",","); ?></h3>

 </center>




<?php 
$in_cart=false;
if(isset($_SESSION["cart"])){
  foreach ($_SESSION["cart"] as $pc) {
    if($pc["product_id"]==$p->id){ $in_cart=true;  }
  }
  }

  ?>
<center>

<?php
 if(!$p->existente):?>

<a href="javascript:void()" class="btn btn-labeled btn-sm btn-warning tip" title="No disponible">
                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span>No Disponible</a>
&nbsp;&nbsp;&nbsp;&nbsp;

<?php elseif(!$in_cart):?>




<a href="index.php?action=addtocart&product_id=<?php echo $p->id; ?>&href=cat" class="btn btn-labeled btn-sm btn-primary tip" title="A&ntilde;adir al carrito">
                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span>Comprar </a>

&nbsp;&nbsp;&nbsp;&nbsp;


<?php else:?>
<center><a href="javascript:void()" class="btn btn-labeled btn-sm btn-success tip" title="Ya esta en el carrito">


                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span>Ya esta agregado</a>



&nbsp;&nbsp;&nbsp;&nbsp;


<?php endif; ?>

<a   class="btn btn-info tip" title="Detalles" href="index.php?view=producto&product_id=<?php echo $p->id; ?>"><i class="fa fa-plus"></i>&nbsp; Detalles </a>
                </center>



              </br>
</div>


            </br></br>



  </div>
<?php endif; ?>
<?php $n++; endfor; ?>
  </div>
<?php endfor; ?>
<?php else:?>
  <div class="jumbotron">
  <h2>No hay productos destacados.</h2>
  <p>En la pagina principal solo se muestran productos marcados como destacados.</p>
  </div>
<?php endif; ?>



  </div>

  </div>


  </div>


<section id="marcas">
        <div class="container">
            <div class="col-xs-12 col-sm-6">

            </div>
            <div class="col-xs-12 col-sm-6">

            </div>
            <div class="col-xs-12">
                <div class="page-header">
                  <h1>Nuestros <small style="color: #333;">Productos</small></h1>
                </div>
                <br><br>
                <img src="./admin/storage/logos-marcas.png" alt="logos-marcas" class="img-responsive">
            </div>
        </div>
      </br>
      </br>
      </br>
    </section>



  </section>

</html>