
<?php
$Utils = new Utils();

?>

{!! Form::model($datos[0], array('route' => array('edit.galeria')))!!}
<div id="establecimiento">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4> Editar</h4>
    </div>
    <div class="modal-body">

        <div class="form-group">
            {!!Form::hidden('idGaleria',null,['class'=>'form-control', 'required', 'id'=>'idGaleria'])!!}

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
                <div col-md-4>
                    {!!Form::label('nombre', 'Tipo de Galeria')!!}
                </div>
                <div col-md-3>
                    <?php
                    $transport = new \Kendo\Data\DataSourceTransport();

                    $read = new \Kendo\Data\DataSourceTransportRead();

                    $read->url('getDatosDropdDowntgaleria')
                            ->contentType('application/json')
                            ->type('POST');

                    $transport->read($read)
                            ->parameterMap('function(data) {
                                return kendo.stringify(data);
           }');

                    $dataSource = new \Kendo\Data\DataSource();

                    $dataSource->transport($transport);


                    $dropDownList = new \Kendo\UI\DropDownList('tgaleria');

                    $dropDownList->dataSource($dataSource)
                            ->dataTextField('nombre')
                            ->dataValueField('id')
                            ->attr('style', 'width: 100%');

                    echo $dropDownList->render();

                    ?>
                </div>
            </div>






            <div class="form-group">
                {!!Form::label('Descripcion')!!}
                {{$datos[0]->descripcion}}
            </div>


            <div class="form-group">
                {!!Form::label('Estado')!!}
                {{$datos[0]->estadoGaleria}}
            </div>



        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
</div>
{!!Form::close()!!}
