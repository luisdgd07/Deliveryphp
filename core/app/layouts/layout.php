<?php
$title = ConfigurationData::getByPreffix("general_main_title")->val;
$titlefull = ConfigurationData::getByPreffix("general_title_full")->val;
$titlebanner = ConfigurationData::getByPreffix("general_title_banner")->val;
$num_wsp1 = ConfigurationData::getByPreffix("general_num_whatsapp1")->val;
$link_wsp1 = ConfigurationData::getByPreffix("general_link_whatsapp1")->val;
$fanpage = ConfigurationData::getByPreffix("general_fan_page")->val;
$googleplus = ConfigurationData::getByPreffix("general_google_plus")->val;

?>
<!DOCTYPE html>
<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="keywords" lang="es" content="Desarrollo de sistemas web">
<meta name="author" content="Norah Zelaya Luisaga" />
<meta name="google-site-verification" content="ohcyVEk3xVN3FH4QD9VumO1YlCFHhjYQ8LZb5iXnfW4" />




  <title><?php echo $titlebanner; ?></title>

  <link rel="stylesheet" type="text/css" href="res/lib/bootstrap/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="res/lib/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="res/btn-label.css">
  <link rel="stylesheet" type="text/css" href="res/productos.css">
  <script src="res/lib/jquery/jquery.min.js"></script>
  <script src="res/bootstrap-rating.min.js"></script>


<link rel="icon" type="image/png" href="admin/storage/icono.png" />


</head>
<body id="fondo-imagen">



<nav class="navbar navbar-inverse" role="navigation">
<div class="container">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <strong class="navbar-brand" href="./"><?php echo $titlebanner; ?></strong>
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">

      <li><a href="./"><i class="fa fa-home"></i> Inicio</a></li>
     




      <li><a href="index.php?view=nosotros"><i class="fa fa-university"></i> Nosotros</a></li>

<?php
$cats = CategoryData::getPublics();
function if_has_child($cats, $id, $success='',$notsuccess ='' ){
  foreach ($cats as $cat) {
    if($cat->padre == $id){
      return $success;
    }
  }
  return $notsuccess;
}
function show_sub_dropdown($cats, $id, $prof = 1){
  foreach ($cats as $cat) {
    if($cat->padre == $id){?>
        <li class="<?php echo if_has_child($cats, $cat->id,'dropdown');?>">
          <a 
            class="<?php echo if_has_child($cats, $cat->id,'dropdown-toggle');?>" 
            data-toggle="<?php echo if_has_child($cats, $cat->id,'dropdown');?>" 
            href="index.php?view=products&cat=<?php echo $cat->detalle_cat; ?>" class="list-group-item">
            <?php echo $cat->nombre; ?>
            <?php
              echo if_has_child($cats, $cat->id,"<i class='fa fa-chevron-right'></i>");
            ?>
          </a>
          <ul class="dropdown-menu" style="top:5px;left:100px;">
            <?php show_sub_dropdown($cats,$cat->id); ?>
          </ul>
        </li>
    <?php
    }
  }
}
?>
<?php if(count($cats)>0):?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th-list"></i> Productos<b class="caret"></b></a>
        <ul class="dropdown-menu">
        <?php foreach($cats as $cat):?>
          <?php if($cat->padre==-1): ?>
          <li class="<?php echo if_has_child($cats, $cat->id,'dropdown');?>">
            <a
              class="<?php echo if_has_child($cats, $cat->id,'dropdown-toggle');?>" 
              data-toggle="<?php echo if_has_child($cats, $cat->id,'dropdown');?>" 
              href="index.php?view=products&cat=<?php echo $cat->detalle_cat; ?>"><?php echo $cat->nombre; ?>
              <?php
                echo if_has_child($cats, $cat->id,"<i class='fa fa-chevron-right'></i>");
              ?>
            </a>
            <ul class="dropdown-menu" style="top:5px;left:100px;">
            <?php show_sub_dropdown($cats,$cat->id); ?>
            </ul>
          </li>
          <?php endif; ?>
        <?php endforeach; ?>
        </ul>
      </li>
    <?php endif; ?>

<li><a href="index.php?view=contacto"><i class="fa fa-envelope"></i> Contactanos</a></li>

 <!-- index.php?view=contacto -->







  </ul>

    <ul class="nav navbar-nav navbar-right">

     <?php if(!isset($_SESSION["client_id"])):?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i>&nbsp;Iniciar Sesion <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=clientaccess">Iniciar Sesion</a></li>
          <li><a href="index.php?view=register">Registrarse</a></li>
        </ul>
      </li>
    </ul>
<?php else:
$client = ClientData::getById($_SESSION["client_id"]);
?>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> &nbsp; <?php echo $client->nombre." ".$client->apellidos;?><b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?view=client"> Mis Compras</a></li>
          <li><a href="logout.php">Salir</a></li>
        </ul>
      </li>
    </ul>
<?php endif; ?>







  </div><!-- /.navbar-collapse -->
</div>





<section id="color-fondo">
</nav>




  <div class="container">
    <div class="row"><center>
     <div class="col-md-3 col-xs-5"> 

       

<!--



     <br>
     <h1><?php echo $title; ?></h1> 
     <br>


-->



      </div>


      <div class="col-md-10 col-xs-10">
<br>
<!--<form class="form-horizontal" role="form">
<div class="input-group">
<input type="hidden" name="view" value="products">
   <input type="hidden" name="act" value="search">
      <input type="text" name="q" placeholder="Buscar productos por nombre ..." class="form-control">
        <span class="input-group-btn">
        <button class="btn btn-primary" type="button">&nbsp;<i class="fa fa-search"></i>&nbsp; </button>
      </span>
    </div><! /input-group -->
</form>

      </div>
      
      <div class="col-md-2 col-xs-2">
        <!-- cart button -->
<br>
<a href="index.php?view=mycart" class="btn btn-block btn-default"><i class="fa fa-shopping-cart"></i> 
<?php if(isset($_SESSION["cart"])):?>
<span class="badge"><?php echo count($_SESSION["cart"]); ?></span>
<?php endif; ?>
      </a>
      </div>

    </div>
  </div>
</section>





<?php View::load("index"); ?>



  <script src="res/lib/bootstrap/js/bootstrap.js"></script>
  <script>
  $(".dropdown").hover(
    ev => {
      let $this = $(ev.target.parentElement);
      $this.addClass('open');
    },
    ev => {
      let $this = $(ev.target.parentElement);
      $this.removeClass('open');
    })
  $(".tip").tooltip();
  </script>



 <section>

    <link rel="stylesheet" href="./res/footer.css">
    
<footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <h3 class="logo"><p href="./">Delivery</p></h3>
                </div>
                <div class="col-sm-2">
                    <h5>Empezar</h5>
                    <ul>
                        <li><a href="./">Inicio</a></li>
                        <li><a href="./index.php?view=register">Registrate</a></li>
                     
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Sobre nosotros</h5>
                    <ul>
                        <li><a href="./index.php?view=nosotros">Información</a></li>
                        <li><a href="./index.php?view=contacto">Contáctenos</a></li>
                        <li><a href="./index.php?view=contacto">Comentarios</a></li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <h5>Soporte</h5>
                    <ul>
                        <li><a href="./index.php?view=contacto">Preguntas</a></li>
                        <li><a href="./index.php?view=contacto">Ayuda</a></li>
                       
                    </ul>
                </div>
                <div class="col-sm-3">
                    <div class="social-networks">
                        <a href="<?php echo $link_wsp1; ?>" title="Enviar Whatsapp" target="_blank" class="twitter"><i target="_blank" class="fa fa-whatsapp"></i></a>
                        <a href="<?php echo $fanpage; ?>" title="Pagina de Facebook"target="_blank" class="facebook"><i class="fa fa-facebook"></i></a>
                        <a href="<?php echo $googleplus; ?>" target="_blank" title="Google"class="google"><i class="fa fa-google-plus"></i></a>
                    </div>
                    <div>
                      <a href="./index.php?view=contacto">
                     <button type="button" class="btn btn-default">Contáctenos</button>
                    </a>
                  </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <p class="text-center">
           Copyright © <?php echo date('Y'); ?> By <a href="#" target="_blank"><em>Delivery </em></a>. Todos los derechos reservados <br>
          <small style="color:#999"><em>Delivery cel: <?php echo $num_wsp1; ?></em></small>
        </p>
        </div>
    </footer>

</section>

</body>
</html>