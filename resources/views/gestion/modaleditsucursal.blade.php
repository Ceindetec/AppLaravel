
<?php
$Utils = new Utils();

?>

{!! Form::model($datos[0], array('route' => array('edit.sucursal')))!!}
<div id="menuplato">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4> Editar</h4>
    </div>

    <div class="modal-body" >

        <div class="form-group" >
            {!!Form::hidden('idSucursal',null,['class'=>'form-control', 'required', 'id'=>'idSucursal'])!!}


            <div class="form-group">

                {!!Form::label('nombre:')!!}
                {!!Form::text('nombre',null,['class'=>'form-control', 'required', 'id'=>'nombre'])!!}

            </div>

            <div class="form-group">

                {!!Form::label('direccion:')!!}
                {!!Form::text('direccion',null,['class'=>'form-control', 'required', 'id'=>'direccion'])!!}

            </div>

            <div class="form-group">
                {!!Form::label('telefono:')!!}
                {!!Form::text('telefono',null,['class'=>'form-control', 'required', 'id'=>'telefono'])!!}

            </div>

            <div class="form-group">
                <div col-md-4>
                    {!!Form::label('nombre', 'Categorias')!!}
                </div>

                <div col-md-3>
                    <?php
                    $transport = new \Kendo\Data\DataSourceTransport();

                    $read = new \Kendo\Data\DataSourceTransportRead();

                    $read->url('getDropDownCategoria')
                            ->contentType('application/json')
                            ->type('POST');

                    $transport->read($read)
                            ->parameterMap('function(data) {
                                return kendo.stringify(data);
           }');

                    $dataSource = new \Kendo\Data\DataSource();

                    $dataSource->transport($transport);


                    $dropDownList = new \Kendo\UI\DropDownList('categoria');

                    $dropDownList->dataSource($dataSource)
                            ->dataTextField('nombre')
                            ->dataValueField('id')
                            ->attr('style', 'width: 100%');

                    echo $dropDownList->render();

                    ?>
                </div>
            </div>

            <div class="form-group">
                {!!Form::label('Estado:')!!}
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
