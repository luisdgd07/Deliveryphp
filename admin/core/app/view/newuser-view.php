<div class="row">
	<div class="col-md-12">
	<h1>Agregar Usuario</h1>
	<br>
		<form class="form-horizontal" method="post" id="addproduct" action="index.php?action=adduser" role="form">


  <div class="form-group">
    <label for="nombre" class="col-lg-2 control-label">Nombre*</label>
    <div class="col-md-6">
      <input type="text" name="nombre" class="form-control" id="nombre" placeholder="Nombre">
    </div>
  </div>
  <div class="form-group">
    <label for="apellidos" class="col-lg-2 control-label">Apellido*</label>
    <div class="col-md-6">
      <input type="text" name="apellidos" required="" class="form-control" id="apellidos" placeholder="Apellido">
    </div>
  </div>
  <div class="form-group">
    <label for="nombre_usuario" class="col-lg-2 control-label">Nombre de usuario*</label>
    <div class="col-md-6">
      <input type="text" name="nombre_usuario" class="form-control" required id="nombre_usuario" placeholder="Nombre de usuario">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-lg-2 control-label">Email*</label>
    <div class="col-md-6">
      <input type="email" name="email" class="form-control" id="email" placeholder="Correo electronico">
    </div>
  </div>

  <div class="form-group">
    <label for="password" class="col-lg-2 control-label">Contrase&ntilde;a</label>
    <div class="col-md-6">
      <input type="password" required name="password" class="form-control" id="password" placeholder="Contrase&ntilde;a">
    </div>
  </div>

  <div class="form-group">
    <label for="administrador" class="col-lg-2 control-label">Es Administrador</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="administrador" id="administrador"> 
    </label>
  </div>
    </div>
  </div>

  <div class="form-group">
    <label for="desarrollador" class="col-lg-2 control-label">Es Desarrollador</label>
    <div class="col-md-6">
<div class="checkbox">
    <label>
      <input type="checkbox" name="desarrollador" id="desarrollador"> 
    </label>
  </div>
    </div>
  </div>

  <p class="alert alert-info">* Campos obligatorios</p>

  <div class="form-group">
    <div class="col-lg-offset-2 col-lg-10">
      <button type="submit" class="btn btn-primary">Agregar Usuario</button>
    </div>
  </div>
</form>
	</div>
</div>