<!-- cabezera -->





<?php 


if(isset($_GET["cat"]))
{
  $cat = CategoryData::getByPreffix($_GET["cat"]);
  $products = ProductData::getPublicsByCategoryId($cat->id);
}

/*
else if(isset($_GET["opt"]))
{
  if($_GET["opt"]=="news")
  {
    $products = ProductData::getNews();
  }
  else if($_GET["opt"]=="offers")
  {
    $products = ProductData::getOffers();
  }

}

else if(isset($_GET["act"]) && $_GET["act"]=="search")
{
  $products = ProductData::getLike($_GET["q"]);
}
*/
$coin = ConfigurationData::getByPreffix("general_coin")->val;
//$img_default = ConfigurationData::getByPreffix("general_img_default")->val;

//$coin = __COIN__;

?>



<section id="color-fondo">



  <div class="container">




<div class="panel panel-primary">
        <div class="panel-heading">Elige la Categoria</div>

<?php
function show_sub($cats, $id, $prof = 1){
  foreach ($cats as $cat) {
    if($cat->padre == $id){?>
      <a href="index.php?view=products&cat=<?php echo $cat->detalle_cat; ?>" class="list-group-item">
        <?php for($i=0;$i<=$prof;$i++):?>
          <i class="fa fa-chevron-right"></i>  
        <?php endfor; echo $cat->nombre; ?></a>
    <?php
      show_sub($cats, $cat->id, $prof+1);
    }
  }
}

$cats = CategoryData::getPublics();
?>
<?php if(count($cats)>0):?>
<div class="list-group">
<?php foreach($cats as $cat):?>
<?php if($cat->padre==-1): ?>
<a href="index.php?view=products&cat=<?php echo $cat->detalle_cat; ?>" class="list-group-item"><i class="fa fa-chevron-right"></i>  <?php echo $cat->nombre; ?></a>
<?php show_sub($cats, $cat->id); ?>
<?php endif; ?>
<?php endforeach; ?>
</div>
<?php endif; ?>
      </div>
  <div class="row">



<br>




  <div class="col-md-12">
    <div style="background:#ff072c ;font-size:25px;color:white;padding:5px;">Productos </div>






<br>
<?php

$nproducts = count($products);
$filas = $nproducts/3;
$extra = $nproducts%3;
if($filas>1&& $extra>0){ $filas++; }
$n=0;
?>
<?php if($nproducts>0):?>
<?php for($i=0;$i<$filas;$i++):?>
  <div class=”row”>
<?php for($j=0;$j<3;$j++):
$p=null;
if($n<$nproducts){
$p = $products[$n];
}
?>
<?php if($p!=null):
$img = "admin/storage/products/".$p->imagen;
if($p->imagen==""){
  $img=$img_default;
}

?>







  <div class="col-md-4 col-sm-6" >

<!-- modal-content -->
<!-- productos -->

<div class="modal-producto">

<a href="index.php?view=producto&product_id=<?php echo $p->id; ?>" class = ''>

 <center>  
  

<img id="myImg" src="<?php echo $img; ?>" alt="Snow" style="width:230px;height:230px;">

<!-- The Modal -->
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>



 </center>

 <center>
  <h4 class="titulos"><?php echo $p->nombre; ?></h4>
  </center>
  </a>

  <center>
<h3 class="precios cursor"><?php echo $coin; ?> <?php echo number_format($p->precio,2,".",","); ?></h3>

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
                <span class="btn-label"><i class="fa fa-shopping-cart"></i></span>Comprar</a>


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
  <h2>No hay productos</h2>
  <p>No hay productos por mostrar en la Categoria '<?php echo CategoryData::getByName($_GET['cat'])->nombre_largo;  ?>'</p>
  </div>
<?php endif;?>


  </div>
  </div>


  </div>
  </section>




</body>