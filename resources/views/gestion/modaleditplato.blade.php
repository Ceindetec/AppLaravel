
<div id="plato">

    <div class="modal-header">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3> Detalles</h3>
            </div>


            <div class="modal-body" style="padding:40px 50px;">


                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4"><b>Establecimiento:</b></div>
                        <div class="col-sm-8">

                            <input type="text" value="{{$datos[0]->nombreEstablecimiento}}"id="encargado">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4"><b>Categoria:</b></div>
                        <div class="col-sm-8">
                            <input type="text" value=" {{$datos[0]->nombreCategoria}}"id="establecimiento">
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4"><b>Nombre:</b></div>
                        <div class="col-sm-8"><input type="text" value=" {{$datos[0]->nombre}}"id="web"></div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4"><b>Descripcion:</b></div>
                        <div class="col-sm-8"> <input type="text" value=" {{$datos[0]->descripcion}}"id="correo">

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4"><b>Estado:</b></div>
                        <div class="col-sm-8"><input type="text" value=" {{$datos[0]->estadoPlato}}"id="facebok"></div>
                    </div>
                </div>



            </div>
            <div class="modal-footer">
                <input type="submit" class="btn btn-primary" value="Guardar">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

            </div>
        </div>

