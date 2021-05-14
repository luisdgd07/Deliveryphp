<?php

$buys =  BuyData::getAll();
/*$coin = ConfigurationData::getByPreffix("general_coin")->val;
$iva = ConfigurationData::getByPreffix("general_iva")->val;*/

?>
        <!-- Main Content -->

          <div class="row">
          <div class="col-md-12">
          <h1>PEDIDOS</h1>
          </div>
          </div>

          <div class="row">
            <div class="col-lg-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-tasks"></i> PEDIDOS
                </div>
                <div class="widget-body medium no-padding">

                  <div class="table-responsive">
<?php if(count($buys)>0):?>
                    <table class="table table-bordered">
                    <thead>
                      <th>Ver</th>
                      <th>Operacion</th>
                      <th>Cliente</th>
                      <th>---</th>
                      <th>Total</th>
                      <th>Metodo de pago</th>
                      <th>Estado</th>
                      
                      <th>Fecha</th>
                      <th>Pedido</th>
                    </thead>
<?php foreach($buys as $b):
$discount=0;
?>
                        <tr>
                        <td><a href="index.php?view=openbuy&buy_id=<?php echo $b->id; ?>" class="btn btn-xs btn-primary">Detalles</a>
&nbsp;&nbsp;
                        <a target="_blank" href="../invoice.php?codigo=<?php echo $b->codigo; ?>" class="btn btn-xs btn-info">Imprimir</a>

                        <a target="_blank" href="<?php echo $b->enlace; ?>" class="btn btn-xs btn-warning">ubicacion</a>
                        </td>
                        <td>#<?php echo $b->id; ?></td>
                        <td><?php echo $b->getClient()->getFullname(); ?></td>

                        
    <td><?php //echo $coin; ?>

    <!--  <?php 
      $buy=$b;
      $discount=0;

      if($buy->coupon_id!=null){
        $coupon = CouponData::getById($buy->coupon_id);
        $discount = $coupon->val;
        echo number_format($discount,2,".",",");
        }else{
        echo number_format($discount,2,".",",");

        }
      ?>
      %-->
    </td>
                           <td><?php echo $buy->total; ?></td>
                        <td><?php echo $b->getPaymethod()->nombre; ?></td>
                        <td><?php echo $b->getStatus()->nombre; ?></td>
                      <!--  <td><?php echo $b->enlace; ?></td>-->
                        <td><?php echo $b->creado; ?></td>
                        <th>
                        <?php if($b->status_id!=3):?>
                            <a href="./?view=buyhistory&id=<?php echo $b->id;?>" class="btn btn-default btn-xs tip" title="Hora"><i class="fa fa-clock-o"></i></a>
                          <?php if($b->status_id!=5):?>
                            <a href="./?action=changestatus&id=<?php echo $b->id;?>&status=4" class="btn btn-success btn-xs tip" title="Enviado"><i class="fa fa-truck"></i></a>

                           
                            
                            <a href="./?action=changestatus&id=<?php echo $b->id;?>&status=2" class="btn btn-info btn-xs tip" title="Pagado" ><i class="fa fa-usd"></i></a>
                            
                             <a href="./?action=changestatus&id=<?php echo $b->id;?>&status=5" class="btn btn-primary btn-xs tip" title="Finalizar""><i class="fa fa-check"></i></a>
                            
                            <a href="./?action=changestatus&id=<?php echo $b->id;?>&status=3" class="btn btn-danger btn-xs  tip" title="Eliminar""><i class="fa fa-remove"></i></a>
                          <?php else:?>
                            <i class="fa fa-check"></i>
                          <?php endif;?>
                          <?php else:?>
                            <i class="fa fa-remove"></i>
                          <?php endif;?>
                        </th>
                        </tr>
<?php endforeach; ?>
                    </table>
<?php else:?>
  <div class="panel-body">
  <h1>No hay operaciones</h1>
  </div>
<?php endif; ?>
                  </div>
                </div>
              </div>
            </div>

          </div>
