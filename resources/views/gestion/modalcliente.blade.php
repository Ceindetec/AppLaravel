
<div id="Cliente">

  <div class="modal-header">

<div class="panel panel-primary">
  <div class="panel-heading">
    <h3> Detalles</h3>
  </div>

  <div class="modal-body" style="padding:40px 50px;">


  <div class="form-group">
  <div class="row">
      <div class="col-sm-4"><b>ID del usuario:</b></div>
      <div class="col-sm-8">{{$datos[0]->idusuario}}</div>
  </div>
  </div>

  <div class="form-group">
  <div class="row">
    <div class="col-sm-4"><b>Usuario:</b></div>
    <div class="col-sm-8">{{$datos[0]->user}}</div>
  </div>
  </div>

  <div class="form-group">
  <div class="row">
    <div class="col-sm-4"><b>Primer Nombre:</b></div>
    <div class="col-sm-8">{{$datos[0]->pnombre}}</div>
  </div>
  </div>
    
    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>Segundo Nombre:</b></div>
    <div class="col-sm-8">{{$datos[0]->snombre}}</div>
  </div>
  </div>

    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>Primer Apellido:</b></div>
    <div class="col-sm-8">{{$datos[0]->papellido}}</div>
  </div>
  </div>

    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>Segundo Apellido:</b></div>
    <div class="col-sm-8">{{$datos[0]->sapellido}}</div>
  </div>
  </div>
  
    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>E-Mail:</b></div>
    <div class="col-sm-8">{{$datos[0]->email}}</div>
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
    <div class="col-sm-4"><b>Celular:</b></div>
    <div class="col-sm-8">{{$datos[0]->celular}}</div>
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
    <div class="col-sm-4"><b>Tipo de Usuario:</b></div>
    <div class="col-sm-8">{{$datos[0]->tipousuario}}</div>
  </div>
  </div>

    <div class="form-group">
    <div class="row">
    <div class="col-sm-4"><b>Estado:</b></div>
    <div class="col-sm-8">{{$datos[0]->estadousuario}}</div>
  </div>
  </div>
  


  <div class="modal-footer">
   <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

 </div>
</div>