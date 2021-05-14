
<?php 
$p = ProductData::getById($_GET["product_id"]);
$img_default = ConfigurationData::getByPreffix("general_img_default")->val;
$coin_symbol = ConfigurationData::getByPreffix("general_coin")->val;
$ratings = RatingData::getPublicsByProductId($p->id);
Viewer::addView($p->id,"product_id","product_view");

 ?>
<section>
  <div class="container">

  <div class="row">
  <div class="col-md-3">
          <div class="panel panel-primary">
        <div class="panel-heading">Categorias</div>

<?php
$cats = CategoryData::getPublics();
?>
<?php if(count($cats)>0):?>
<div class="list-group">
<?php foreach($cats as $cat):?>

<a href="index.php?view=products&cat=<?php echo $cat->detalle_cat; ?>" class="list-group-item"><i class="fa fa-chevron-right"></i>  <?php echo $cat->nombre; ?></a>
<?php endforeach; ?>
</div>
<?php endif; ?>
      </div>
  </div>
  <div class="col-md-9">



    <div style="background:#3498db;font-size:25px;color:white;padding:5px;"><?php echo $p->nombre; ?></div>




 <h2 class="entry-title"><span><?php echo $p->name; ?></span></h2>
<p class="lead"><span class="text-warning"><input type="hidden" name="rating" disabled class="rating" value="<?php echo RatingData::getAvg($p->id)->avg;?>"></span> (<?php echo count($ratings);?> calificaciones)</p>
<!--
              <div class="breadcrumb">
                <span></span>
                <a href="./">Inicio</a>
                <span class="crumbs-spacer"><i class="fa fa-angle-double-right"></i></span>
                <span class="current"><?php echo $p->name; ?></span>
              </div>
              -->


<br/>


<?php if($p!=null):
$img = "admin/storage/products/".$p->imagen;
if($p->imagen==""){
  $img=$img_default;
}
?>
  <div class="row">
  <div class="col-md-8">
 <center>   <img src="<?php echo $img; ?>"  style="width:250px;height:250px;"></center>

  </div>
  <div class="col-md-4">
<h1 class="text-primary"><?php echo $coin_symbol; ?> <?php echo number_format($p->precio,2,".",","); ?>BS</h1>
<?php 
$in_cart=false;
if(isset($_SESSION["cart"])){
  foreach ($_SESSION["cart"] as $pc) {
    if($pc["product_id"]==$p->id){ $in_cart=true;  }
  }
  }

  ?>
<?php if(!$p->existente):?>
<a href="javascript:void()" class="btn btn-labeled btn-warning tip" title="No Disponible">
                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span>No Disponible</a>

<?php elseif(!$in_cart):?>
<a href="index.php?action=addtocart&product_id=<?php echo $p->id; ?>&href=product" class="btn btn-labeled btn-primary tip" title="A&ntilde;adir al carrito">
                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span>Comprar</a>
<?php else:?>
<a href="index.php?action=addtocart&product_id=<?php echo $p->id; ?>&href=product" class="btn btn-labeled btn-success tip" title="Ya esta en el carrito">
                <span class="btn-label"><i class="glyphicon glyphicon-shopping-cart"></i></span>Ya esta agregado</a>

<?php endif; ?>    
    <?php if($p->existente):?>
      <p class="text-success">Producto en Existencia</p>
    <?php else:?>
      <p class="text-warning">Producto no disponible</p>
    <?php endif; ?>
  </div>
  </div>
  <br><br>
  <div class="row">
  <div class="col-md-12">
  <hr>
  <h3>Codigo: <?php echo $p->code; ?></h3>
  <hr>
<h3>Marca: <?php echo $p->marca; ?><h4>
   <hr>
  <h3>Modelo: <?php echo $p->modelo; ?><h4>
    <hr>
<h3>Especificaciones: </h4> <h4> <p><?php echo $p->description; ?></p><h4>
<hr>

<br/>


       <?php 
$cnt=0;
$slides = ProductImageData::getAllByProductId($p->id);
        if(count($slides)>0):?>
        <div class="row">
<div class="col-md-8 col-md-offset-2">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
<?php foreach($slides as $s):?>
        <li data-target="#carousel-example-generic" data-slide-to="<?php echo $cnt; ?>" class="<?php if($cnt==0){ echo "active";}?>"></li>
<?php $cnt++; endforeach; ?>
      </ol>
      <div class="carousel-inner">
<?php $cnt=0; foreach($slides as $s):
$url = "admin/storage/products/$p->id/".$s->src;
?>      <div class="item <?php if($cnt==0){ echo "active"; }?>">
          <img src="<?php echo $url; ?>" alt="...">
          <div class="carousel-caption">
            <h2><?php echo $s->title; ?></h2>
            <p><?php echo $s->description;?></p>
          </div>
        </div>
<?php $cnt++; endforeach; ?>
      </div>
      <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
      </a>
    </div>
    </div>
    </div>
  <?php endif; ?>

<hr>
<h3>Calificaciones: </h3>
<!-- Button trigger modal -->
<?php 
if(isset($_SESSION["client_id"])):
$r = RatingData::getByCP($_SESSION["client_id"],$p->id);
?>
<?php if($r==null):?>
<button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
  Publicar calificacion
</button>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Calificar</h4>
      </div>
      <div class="modal-body">

<form method="post" action="./?action=calificate" id="calificate">
<input type="hidden" name="product_id" value="<?php echo $p->id; ?>">
  <div class="form-group">
    <label for="exampleInputEmail1">Calificacion</label>
<h2 >
<span class="text-warning"><input type="hidden" name="rating" id="rating" class="rating" name=""></span>
</h2>

  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Comentario</label>
    <textarea name="comment" required class="form-control"></textarea>
  </div>
  <button type="submit" class="btn btn-info">Calificar</button>
</form>

      </div>

    </div>
  </div>
</div>

<script type="text/javascript">
  $("#calificate").submit(function(e){
    if($("#rating").val()==""){
      alert("Debes seleccionar una calificacion!");
      e.preventDefault();
    }

  });
</script>
<?php endif; ?>
<?php endif; ?>
<?php

if(count($ratings)>0):
?>
<table class="table table-bordered table-hover">
<?php foreach($ratings as $r):
$cli = $r->getClient();
?>
<tr>
<td class="col-md-4">
  <p><b><?php echo $cli->name." ".$cli->lastname; ?></b></p>
  <p class="text-muted"><?php echo $r->created_at; ?></p>
  </td>
  <td>
  <div class="text-warning">
    <input type="hidden" value="<?php echo $r->rating; ?>" class="rating">
  </div>
  <div><?php echo $r->comment; ?></div>
  </td>
  </tr>
  <?php endforeach;?>
  </table>
<?php else:?>
  <p class="alert alert-warning">Aun no hay calificaciones.</p>
 <?php endif; ?>





</div>
</div>

<?php endif; ?>



  </div>
  </div>


  </div>
  </section>
