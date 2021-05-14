<?php 
  
  $categories = CategoryData::getAll();

?>
        <!-- Main Content -->

          <div class="row">
            <div class="col-md-12">
                  <a  data-toggle="modal" href="#myModal" class="pull-right btn-sm btn btn-default">Agregar Categoria</a>
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Agregar Categoria</h4>
        </div>
        <div class="modal-body">
<form class="form-horizontal" role="form" method="post" action="index.php?action=addcategory">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" name="nombre" placeholder="Nombre de la categoria">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre Corto</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" name="detalle_cat" placeholder="Nombre corto">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Categoria Padre</label>
    <div class="col-lg-10">
      <select class="form-control" name="padre">
        <option value="-1">Ninguna</option>
        <?php foreach ($categories as $cat) : ?>
          <option value="<?php echo $cat->id;?>"><?php echo $cat->nombre;?></option>
        <?php endforeach; ?>
      </select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="activo"> Categoria Activa
        </label>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-block btn-primary">Agregar Categoria</button>
    </div>
  </div>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
            <h1>Categorias</h1>
            </div>
            </div>

          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-th-list"></i> Categorias
                </div>
                <div class="widget-body medium no-padding">
<?php

 if(count($categories)>0):?>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                    <thead>
                    <th></th>
                      <th>Nombre</th>
                      <th>Detalles</th>
                      <th>Activo</th>
                      <th></th>
                    </thead>
                      <tbody>

<?php foreach($categories as $cat):?>
<?php 
      if($cat->padre == -1){
        show_tr($cat); 
        show_sub($cat->id);
      }
?>
<?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
 <?php endif; ?>
                </div>
              </div>
            </div>

          </div>

<?php
  function show_sub($id_sub){
    $subs = CategoryData::getSub($id_sub);
    foreach ($subs as $sub) {
      show_tr($sub);
      if($sub->padre!=-1){
        show_sub($sub->id);
      }
    }
  }

  function show_padre($id_padre){
    $padre = CategoryData::getById($id_padre);
    if($padre->padre != -1){
      return show_padre($padre->padre).$padre->nombre." :: ";
    }
    return $padre->nombre." :: ";
  }

?>


<?php function show_tr($cat){ ?>
    <tr>
      <td style="width:30px;">
        <a href="../?view=productos&cat=<?php echo $cat->detalle_cat; ?>" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-eye"></i></a>
      </td>
      <td>
        <?php if($cat->padre!=-1): ?>
        <?php echo show_padre($cat->padre) ?>
        <?php endif; ?>
        <?php echo $cat->nombre; ?>
      <td><?php echo $cat->detalle_cat; ?>
      <td style="width:70px;"><?php if($cat->activo):?><center><i class="fa fa-check"></i></center><?php endif;?></td>
      </td>
      <td style="width:90px;">
      <a data-toggle="modal" href="#myModal-<?php echo $cat->id;?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a> 
  <!-- Button trigger modal -->

  <!-- Modal -->
  <div class="modal fade" id="myModal-<?php echo $cat->id;?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
          <h4 class="modal-title">Editar Categoria</h4>
        </div>
        <div class="modal-body">
<form class="form-horizontal" role="form" method="post" action="index.php?action=updatecategory">
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" name="nombre" value="<?php echo $cat->nombre;?>" placeholder="Nombre de la categoria">
    </div>
  </div>
  <div class="form-group">
    <label for="inputEmail1" class="col-lg-2 control-label">Nombre Corto</label>
    <div class="col-lg-10">
      <input type="text" required class="form-control" value="<?php echo $cat->detalle_cat; ?>" name="detalle_cat" placeholder="Nombre corto">
    </div>
  </div>
  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <div class="checkbox">
        <label>
          <input type="checkbox" name="activo" <?php if($cat->activo){ echo "checked"; }?>> Categoria Activa
        </label>
      </div>
    </div>
  </div>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
    <input type="hidden" name="id_categoria" value="<?php echo $cat->id; ?>">
      <button type="submit" class="btn btn-block btn-success">Actualizar Categoria</button>
    </div>
  </div>
</form>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
  </div><!-- /.modal -->

                        <a href="index.php?action=delcategory&id_categoria=<?php echo $cat->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> 
                        </td>
                        </tr>
<?php } ?>