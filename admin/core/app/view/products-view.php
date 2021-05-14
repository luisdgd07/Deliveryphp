<?php
  $coin = ConfigurationData::getByPreffix("general_coin")->val;

?>        <!-- Main Content -->


          <div class="row">
            <div class="col-md-12">
                  <a  href="index.php?view=newproduct" class="pull-right btn-sm btn btn-default">Agregar Producto</a>
  <!-- Button trigger modal -->


            <h2>PRODUCTOS</h2>
            </div>
            </div>

          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-th-list"></i> Productos
                </div>
                <div class="widget-body medium no-padding">
<?php

$categories = ProductData::getAll();
 if(count($categories)>0):?>
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <tbody>
<thead>
  <th>Codigo</th>
  <th>Nombre</th>
  <th>Categoria</th>
  <th>Stock</th>
  <th>Precio</th>
  <th>Visible</th>
  <th>Destacado</th>
  <th>Existencia</th>
  <th></th>
</thead>
<?php foreach($categories as $cat):?>
                        <tr>
                        <td><?php echo $cat->codigo; ?></td>
                        <td><?php echo $cat->nombre; ?></td>
                        <td><?php echo $cat->id_categoria; ?></td>
                        <td><?php echo $cat->stock; ?></td>
                        <script type="emergente.js"></script>
                        <td><?php echo $coin."  ".$cat->precio; ?></td>
                        <td style="width:90px;"><center><?php if($cat->visible):?><i class="fa fa-check"></i><?php else: ?><i class="fa fa-remove"></i><?php endif; ?></center> </td>
                        <td style="width:90px;"><center><?php if($cat->destacado):?><i class="fa fa-check"></i><?php else: ?><i class="fa fa-remove"></i><?php endif; ?></center> </td>
                        <td style="width:90px;"><center><?php if($cat->existente):?><i class="fa fa-check"></i><?php else: ?><i class="fa fa-remove"></i><?php endif; ?></center> </td>
                        <td style="width:185px;">
                        <a href="../index.php?view=producto&product_id=<?php echo $cat->id; ?>" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-link"></i></a> 
                        <a href="index.php?view=productimgs&product_id=<?php echo $cat->id; ?>" class="btn btn-default btn-xs"><i class="fa fa-picture-o"></i> Galeria</a> 
                        <a href="index.php?view=editproduct&product_id=<?php echo $cat->id; ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></a> 
                        <a href="index.php?action=delproduct&product_id=<?php echo $cat->id; ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></a> 
                        </td>
                        </tr>
<?php endforeach; ?>
                      </tbody>
                    </table>
                  </div>
<?php else:?>
  <div class="panel-body">
  <p class="alert alert-warning">No hay productos, puedes empezar agregando tu lista de productos.</p>
  </div>
 <?php endif; ?>

                </div>
              </div>
            </div>

          </div>
