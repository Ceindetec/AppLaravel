@extends('layouts.admin.principal')

@section('content')
<?php
$Utils = new Utils();


?>
{!!Form::hidden('idPlatos',null,['class'=>'form-control', 'required', 'id'=>'idPlatos'])!!}
{!! Form::model($datos[0], array('route' => array('edit.plato')))!!}
<div id="plato">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4> Editar</h4>
    </div>
    <div class="modal-body">

        <div class="form-group">
            {!!Form::hidden('idPlatos',null,['class'=>'form-control', 'required', 'id'=>'idPlatos'])!!}



            <div class="form-group">
                {!!Form::label('Nombre')!!}
                {!!Form::text('nombre',null,['class'=>'form-control', 'required', 'id'=>'nombre'])!!}

            </div>

            <div class="form-group">
                {!!Form::label('Descripcion')!!}
                {!!Form::text('descripcion',null,['class'=>'form-control', 'required', 'id'=>'descripcion'])!!}

            </div>

            <div class="form-group">
                <div col-md-4>
                    {!!Form::label('nombre', 'Categoria')!!}
                </div>
                <div col-md-3>
                    <?php
                    $transport = new \Kendo\Data\DataSourceTransport();

                    $read = new \Kendo\Data\DataSourceTransportRead();

                    $read->url('../getDropDownCategoria')
                            ->contentType('application/json')
                            ->type('POST');

                    $transport->read($read)
                            ->parameterMap('function(data) {
                                return kendo.stringify(data);
           }');

                    $dataSource = new \Kendo\Data\DataSource();

                    $dataSource->transport($transport);


                    $dropDownList = new \Kendo\UI\DropDownList('categorias');

                    $dropDownList->dataSource($dataSource)
                            ->dataTextField('nombre')
                            ->dataValueField('id')
                            ->attr('style', 'width: 100%');

                    echo $dropDownList->render();

                    ?>
                </div>
            </div>




            <div class="form-group">
                <div col-md-3>
                    <div class="form-group">
                        {!!Form::label('galeria_id', 'Imagen:')!!}

                        <?php
                        $upload = new \Kendo\UI\Upload('imagen');

                        echo $upload->render();
                        ?>



                    </div>
                    <div class="form-group">
                        <div id="vista_previa"></div>
                    </div>
                </div>
            </div>





            <div class="form-group">
                {!!Form::label('Estado')!!}
                {{$datos[0]->estadoPlato}}
            </div>



        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
</div>
{!!Form::close()!!}

@endsection


