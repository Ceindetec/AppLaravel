
<?php
$Utils = new Utils();

?>

{!! Form::model($datos[0], array('route' => array('edit.establecimiento')))!!}
<div id="establecimiento">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4> Editar</h4>
    </div>
    <div class="modal-body">

        <div class="form-group">
            {!!Form::hidden('idestablecimiento',null,['class'=>'form-control', 'required', 'id'=>'idestablecimiento'])!!}
        <div class="form-group">
            {!!Form::label('Establecimiento')!!}
            {!!Form::text('establecimiento',null,['class'=>'form-control', 'required', 'id'=>'establecimiento'])!!}

        </div>

        <div class="form-group">
            {!!Form::label('Web')!!}
            {!!Form::text('web',null,['class'=>'form-control', 'required', 'id'=>'web'])!!}
        </div>

        <div class="form-group">
            {!!Form::label('Correo')!!}
            {!!Form::text('correo',null,['class'=>'form-control', 'required', 'id'=>'correo'])!!}
        </div>

        <div class="form-group">
            {!!Form::label('Facebook')!!}
            {!!Form::text('facebook',null,['class'=>'form-control', 'required', 'id'=>'facebook'])!!}
        </div>

        <div class="form-group">
            {!!Form::label('Twitter')!!}
            {!!Form::text('twitter',null,['class'=>'form-control', 'required', 'id'=>'twitter'])!!}
        </div>

        <div class="form-group">
            {!!Form::label('Instagram')!!}
            {!!Form::text('instagram',null,['class'=>'form-control', 'id'=>'instagram'])!!}
        </div>

        <div class="form-group">
            {!!Form::label('Estado')!!}
           {{$datos[0]->estado}}
        </div>



        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
</div>
{!!Form::close()!!}
