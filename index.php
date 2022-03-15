<?php include "templates/header.php"; ?>




<?php
if ($error) {
  ?>
  <div class="container mt-2">
    <div class="row">
      <div class="col-md-12">
        <div class="alert alert-danger" role="alert">
          <?= $error ?>
        </div>
      </div>
    </div>
  </div>
  <?php
}
?>

<div class="container">
  <div class="row">
    <div class="col">
      <button onclick="ObtenerCliente('0')" class="btn btn-primary"><i class="fas fa-plus-square">&nbsp;Nuevo</i></button>
    </div>
    <div class="col-md-auto">
        <input type="text" id="busqueda" name="busqueda" placeholder="Buscar" class="form-control">
    </div>
    <div class="col col-lg-2">    
        <button onclick="LeerRegistros()" class="btn btn-info"><i class="fas fa-search">&nbsp;Buscar</i></button>
    </div>
  </div>
</div>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      
        <div id="records_content"></div>
    </div>
  </div>
</div>


<!-- Modal - Update User details -->
<div class="modal fade" id="update_cliente_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
   
      <div class="modal-header">
          <h5 class="modal-title"><label id="uptate_titulo">Cliente</label></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> 
      
      
      <div class="modal-body">
        <div class="form-group">
          <label for="rfc">RFC</label>
          <input style="text-transform:uppercase" type="text" id="update_rfc" placeholder="RFC" value="" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="cliente">Cliente</label>
          <input type="text" id="update_cliente" placeholder="Cliente" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="direccion">Direccion</label>
          <textarea id="update_direccion" placeholder="Direccion" class="form-control"></textarea>
        </div>
        <div class="form-group">
          <label for="telefono">Telefono</label>
          <input type="text" id="update_telefono" placeholder="Telefono" class="form-control"/>
        </div>
        <div class="form-group">
          <label for="correoelectronico">Correo Electronico</label>
          <input type="email" id="update_correoelectronico" placeholder="Correo Electronico" class="form-control"/>
        </div> 
         
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-success" id="update_guardar" onclick="UpdateCliente()" id="btnGuardar"><i class="far fa-save">&nbsp;Guardar</i></button>
        <input type="hidden" id="hidden_idcliente">
      </div>
    </div>
  </div>
</div>
<!-- // Modal --> 
    <script type="text/javascript" src="js/jquery-1.11.3.min.js"></script> 
    <script type="text/javascript" src="js/script8.js"></script> 
    <script src="dist/js/bootstrap.min.js"></script> 

<?php include "templates/footer.php"; ?>