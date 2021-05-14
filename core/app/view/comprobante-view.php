   

<section id="color-fondo">

    
      <div class="modal-dialog" role="document">
        <form class="modal-content FormCatElec" action="process/confirmcompra.php" method="POST" role="form" data-form="save">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Pago por transaccion bancaria</h4>
          </div>
          <div class="modal-body">
            
            <p>Por favor haga el deposito en la siguiente cuenta de banco e ingrese el numero de deposito que se le proporciono.</p><br>
            <p>
              <strong>Nombre del banco:</strong> BANCO ECNONOMICO<br>
              <strong>Numero de cuenta:</strong> 1063010100<br>
              <strong>Nombre del beneficiario:</strong> ARSYSTEL SRL<br>
              <strong>Tipo de cuenta:</strong> CREDITO<br>
            </p>
                <br>
                <div class="form-group">
                    <label>Numero de deposito</label>
                    <input class="form-control" type="text" name="NumDepo" placeholder="Numero de deposito" maxlength="" required="">
                </div>
                <div class="form-group">
                  
               </div>
                <div class="form-group">
                    <label>CI: del cliente</label>
                    <input class="form-control" type="text" name="Cedclien" placeholder="CI: del cliente comprador" maxlength="" required="">
                </div>
                <div class="form-group">
                      <input type="file" name="comprobante">
                      <div class="input-group">
                        <input type="text" readonly="" class="form-control" placeholder="Seleccione la imagen del comprobante...">
                          <span class="input-group-btn input-group-sm">
                            <button type="button" class="btn btn-fab btn-fab-mini">
                              <i class="fa fa-file-image-o" aria-hidden="true"></i>
                            </button>
                          </span>
                      </div>
                        <p class="help-block"><small>Tipos de archivos admitidos, imagenes .jpg y .png. Maximo 5 MB</small></p>
                    </div>
                
                    
                        <br>
                      <center> <button type="button" class="btn btn-primary btn-lg btn-block"> Guardar </button> </center>

                    </div>
                
    </section>