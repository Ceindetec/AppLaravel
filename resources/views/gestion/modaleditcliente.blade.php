
<?php
$Utils = new Utils();

?>

{!! Form::model($datos[0], array('route' => array('edit.cliente')))!!}
<div id="cliente">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4> Editar</h4>
    </div>
    <div class="modal-body">

        <div class="form-group">
            {!!Form::hidden('idusuario',null,['class'=>'form-control', 'required', 'id'=>'idusuario'])!!}
            <div class="form-group">
                {!!Form::label('User')!!}
                {!!Form::text('user',null,['class'=>'form-control', 'required', 'id'=>'user'])!!}

            </div>

            <div class="form-group">
                {!!Form::label('Primer Nombre')!!}
                {!!Form::text('pnombre',null,['class'=>'form-control', 'required', 'id'=>'pnombre'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('Segundo Nombre')!!}
                {!!Form::text('snombre',null,['class'=>'form-control', 'id'=>'snombre'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('Primer Apellido')!!}
                {!!Form::text('papellido',null,['class'=>'form-control', 'required', 'id'=>'papellido'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('Segundo Apellido')!!}
                {!!Form::text('sapellido',null,['class'=>'form-control', 'id'=>'sapellido'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('Email')!!}
                {!!Form::text('email',null,['class'=>'form-control', 'id'=>'email'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('Telefono')!!}
                {!!Form::text('telefono',null,['class'=>'form-control', 'id'=>'telefono'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('Celular')!!}
                {!!Form::text('celular',null,['class'=>'form-control', 'id'=>'celular'])!!}
            </div>

            <div class="form-group">
                {!!Form::label('Facebook')!!}
                {!!Form::text('facebook',null,['class'=>'form-control', 'id'=>'facebook'])!!}
            </div>



            <div class="form-group">
                <div col-md-4>
                    {!!Form::label('nombre', 'Tipo de Usuario')!!}
                </div>
                <div col-md-3>
                    <?php
                    $transport = new \Kendo\Data\DataSourceTransport();

                    $read = new \Kendo\Data\DataSourceTransportRead();

                    $read->url('getDatosDropdDowntusuario')
                            ->contentType('application/json')
                            ->type('POST');

                    $transport->read($read)
                            ->parameterMap('function(data) {
                                return kendo.stringify(data);
           }');

                    $dataSource = new \Kendo\Data\DataSource();

                    $dataSource->transport($transport);


                    $dropDownList = new \Kendo\UI\DropDownList('tusuarios');

                    $dropDownList->dataSource($dataSource)
                            ->dataTextField('nombre')
                            ->dataValueField('id')
                            ->attr('style', 'width: 100%');

                    echo $dropDownList->render();

                    ?>
                </div>
            </div>






            <div class="form-group">
                {!!Form::label('Estado')!!}
                {{$datos[0]->estadousuario}}
            </div>



        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
</div>
{!!Form::close()!!}
