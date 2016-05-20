
<?php
$Utils = new Utils();

?>

{!! Form::model($datos[0], array('route' => array('edit.menuplatos')))!!}
<div id="menuplato">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4> Editar</h4>
    </div>

    <div class="modal-body" >

        <div class="form-group" >
            {!!Form::hidden('idMenuPlato',null,['class'=>'form-control', 'required', 'id'=>'idMenuPlato'])!!}


            <div class="form-group">

                {!!Form::label('Menu:')!!}
                {{$datos[0]->nombreMenuPlato}}

            </div>

            <div class="form-group">

                {!!Form::label('Plato:')!!}
                {{$datos[0]->nombrePlato}}

            </div>

            <div class="form-group">
                {!!Form::label('Valor:')!!}
                {!!Form::text('valor',null,['class'=>'form-control', 'required', 'id'=>'valor'])!!}

            </div>

            <div class="form-group">
                {!!Form::label('Estado:')!!}
                {{$datos[0]->estadoMenuPlato}}
            </div>



        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
</div>
{!!Form::close()!!}
