
<div id="sucursal">

  <div class="modal-header">

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3> Detalles</h3>
  </div>

  <div class="modal-body" style="padding:40px 50px;">


      <div class="form-group">
  <div class="row">
      <div class="col-sm-4"><b>Encargado:</b></div>
      <div class="col-sm-8"> {{$datos[0]->nombreUsuario}}</div>
  </div>
  </div>

  <div class="form-group">
  <div class="row">
    <div class="col-sm-4"><b>Sucursal:</b></div>
    <div class="col-sm-8"> {{$datos[0]->nombre}}</div>
  </div>
  </div>

  <div class="form-group">
  <div class="row">
    <div class="col-sm-4"><b>Direccion:</b></div>
    <div class="col-sm-8">{{$datos[0]->direccion}}</div>
  </div>
  </div>
    
    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>Telefono:</b></div>
    <div class="col-sm-8">{{$datos[0]->telefono}}</div>
  </div>
  </div>

    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>Latitud:</b></div>
    <div class="col-sm-8">{{$datos[0]->latitud}}</div>
  </div>
  </div>

    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>Longitud:</b></div>
    <div class="col-sm-8">{{$datos[0]->longitud}}</div>
  </div>
  </div>
  
    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>Establecimiento:</b></div>
    <div class="col-sm-8">{{$datos[0]->nombreEstablecimiento}}</div>
  </div>
  </div>
    

    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>Categoria:</b></div>
    <div class="col-sm-8">{{$datos[0]->nombreCategoria}}</div>
  </div>
  </div>
    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>Estado:</b></div>
    <div class="col-sm-8">{{$datos[0]->estado}}</div>
  </div>
  </div>


 





 









  <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

 </div>
</div>