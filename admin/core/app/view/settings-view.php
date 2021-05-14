<?php
$settings = ConfigurationData::getAll();
/*$countries = CountryData::getAll();*/
//$coins = CoinData::getAll();
$user = UserData::getById($_SESSION['admin_id']);
?>
        <!-- Main Content -->
          <div class="row">
            <div class="col-md-12">

            <h1>Ajustes Generales</h1>
            <a href="./?view=settings" class="btn btn-default">General</a>
            <a href="./?view=payment_settings" class="btn btn-default">Metodos de Pago</a>
            </div>
            </div>
<br>
          <div class="row">
            <div class="col-md-12">
              <div class="panel panel-default">
                <div class="panel-heading">
                  <i class="fa fa-wrench"></i> Ajustes Generales
                </div>

<form method="post" action="./?action=updatesettings">
                    <table class="table table-bordered">
                      <tbody>
<?php
//  echo ( $settings );
 if(count($settings)>0):?>
<?php foreach($settings as $cat):?>
  <?php 
  if((substr($cat->name, 0,8)=="general_") && $cat->order>-1):?>
    <tr>
      <!--td>
        <input type="number" name="<?php echo $cat->name; ?>_num_order" value="<?php echo $cat->order;?>" >
      </td-->
      <td>
        <?php echo $cat->label; ?>
      </td>
      <td>
        <input type="text" name="<?php echo $cat->name; ?>" class="form-control" value="<?php echo $cat->val;?>">
      </td>
    </tr>
 <?php endif; ?>
<?php endforeach; ?>
 <?php endif; ?>

                        <tr>
                        <td>
                        </td>
                        <td>
                        <input type="submit"  class="btn btn-success" value="Actualizar Ajustes">
                        </td>
                        </tr>
                      </tbody>
                    </table>
                    </form>
<?php if($user->desarrollador == 1): ?>
<div class="panel-heading">
                  <i class="fa fa-plus"></i> Agregar Ajuste
                </div>
<form method="post" action="./?action=addsettings">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>
          Nombre en Sistema
        </th>
        <th>
          Nombre Publico
        </th>
        <th>
          Valor
        </th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>
          <input type="text" name="name" required>
        </td>
        <td>
          <input type="text" name="label" required>
        </td>
        <td>
          <input type="text" name="val" required>
        </td>
      </tr>
      <tr>
        <td></td>
        <td><input type="submit"  class="btn btn-success" value="Agregar"></td>
      </tr>
    </tbody>
  </table>
</form>
<?php endif; ?>
<!--div class="panel-heading">
  <i class="fa fa-minus"></i> Ajustes no Usados
</div-->




              </div>
            </div>

          </div>
