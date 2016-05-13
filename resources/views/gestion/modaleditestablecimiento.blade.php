<div id="establecimiento">
    {!!Form::open()!!}
    <div class="modal-header">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3> Detalles</h3>
            </div>

            {!! Form::model($datos[0], array('route' => array('edit.establecimiento')))!!}

            <div class="modal-body" style="padding:40px 50px;">


                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4"><b>Encargado:</b></div>
                        <div class="col-sm-8">
                            {!!Form::text('Encargado',null,['class'=>'form-control', 'required', 'id'=>'Encargado'])!!}

                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4"><b>Establecimiento:</b></div>
                        <div class="col-sm-8">
                            {!!Form::text('establecimiento',null,['class'=>'form-control', 'required', 'id'=>'establecimiento'])!!}
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4"><b>Direccion Web:</b></div>
                        {!!Form::text('web',null,['class'=>'form-control', 'required', 'id'=>'web'])!!}
                    </div>
                </div>

                <div class="form-group">
                    <div class="row">
                        <div class="col-sm-4"><b>Correo Electronico:</b></div>

                        {!!Form::text('correo',null,['class'=>'form-control', 'required', 'id'=>'correo'])!!}
                    </div>
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4"><b>Facebook:</b></div>
                    {!!Form::text('facebook',null,['class'=>'form-control', 'required', 'id'=>'facebook'])!!}
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4"><b>Twitter:</b></div>
                    {!!Form::text('twitter',null,['class'=>'form-control', 'required', 'id'=>'twitter'])!!}
                </div>
            </div>

            <div class="form-group">
                <div class="row">
                    <div class="col-sm-4"><b>Instagram:</b></div>
                    {!!Form::text('instagram',null,['class'=>'form-control', 'required', 'id'=>'instagram'])!!}
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
            <input type="submit" class="btn btn-primary" value="Guardar">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

        </div>
    </div>
{!!Form::close()!!}
