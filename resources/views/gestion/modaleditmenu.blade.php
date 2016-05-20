
<?php
$Utils = new Utils();

?>

{!! Form::model($datos[0], array('route' => array('edit.menu')))!!}
<div id="menu">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4> Editar</h4>
    </div>

    <div class="modal-body" >

        <div class="form-group" >
            {!!Form::hidden('idMenu',null,['class'=>'form-control', 'required', 'id'=>'idMenu'])!!}



            <div class="form-group">
                {!!Form::label('Nombre')!!}
                {!!Form::text('nombreMenu',null,['class'=>'form-control', 'required', 'id'=>'nombreMenu'])!!}

            </div>

            <div class="form-group">
                {!!Form::label('Descripcion')!!}
                {!!Form::text('descripcionMenu',null,['class'=>'form-control', 'required', 'id'=>'descripcionMenu'])!!}

            </div>

            <div class="form-group">
                {!!Form::label('Estado')!!}
                {{$datos[0]->estadoMenu}}
            </div>



        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
</div>
{!!Form::close()!!}
