
<div id="establecimiento">

  <div class="modal-header">

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3> Detalles</h3>
  </div>

  <div class="modal-body" style="padding:40px 50px;">
	

  <div class="form-group">
  <div class="row">
      <div class="col-sm-4"><b>Encargado:</b></div>
      <div class="col-sm-8">{{$datos[0]->Encargado}}</div>
  </div>
  </div>

  <div class="form-group">
  <div class="row">
    <div class="col-sm-4"><b>Establecimiento:</b></div>
    <div class="col-sm-8">{{$datos[0]->establecimiento}}</div>
  </div>
  </div>

  <div class="form-group">
  <div class="row">
    <div class="col-sm-4"><b>Direccion Web:</b></div>
    <div class="col-sm-8">{{$datos[0]->web}}</div>
  </div>
  </div>
    
    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>Correo Electronico:</b></div>
    <div class="col-sm-8">{{$datos[0]->correo}}</div>
  </div>
  </div>

    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>Facebook:</b></div>
    <div class="col-sm-8">{{$datos[0]->facebook}}</div>
  </div>
  </div>

    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>Twitter:</b></div>
    <div class="col-sm-8">{{$datos[0]->twitter}}</div>
  </div>
  </div>
  
    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>Instagram:</b></div>
    <div class="col-sm-8">{{$datos[0]->instagram}}</div>
  </div>
  </div>
    
    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>Estado:</b></div>
    <div class="col-sm-8">{{$datos[0]->estado}}</div>
  </div>
  </div>
    
  </div>
  <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

 </div>
</div>