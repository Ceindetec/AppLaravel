
<?php
$Utils = new Utils();

?>

{!! Form::model($datos[0], array('route' => array('edit.menusucursal')))!!}
<div id="menusucursal">

    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4> Editar</h4>
    </div>

    <div class="modal-body" >

        <div class="form-group" >
            {!!Form::hidden('idMenuSucursal',null,['class'=>'form-control', 'required', 'id'=>'idMenuSucursal'])!!}



            <div class="form-group">


                    <div col-md-4>
                        {!!Form::label('nombre', 'Menus')!!}
                    </div>
                    <div col-md-3>
                        <?php
                        $transport = new \Kendo\Data\DataSourceTransport();

                        $read = new \Kendo\Data\DataSourceTransportRead();

                        $read->url('getdatosdropdownmenu')
                                ->contentType('application/json')
                                ->type('POST');

                        $transport->read($read)
                                ->parameterMap('function(data) {
                                return kendo.stringify(data);
           }');

                        $dataSource = new \Kendo\Data\DataSource();

                        $dataSource->transport($transport);


                        $dropDownList = new \Kendo\UI\DropDownList('menu');

                        $dropDownList->dataSource($dataSource)
                                ->dataTextField('nombre')
                                ->dataValueField('id')
                                ->attr('style', 'width: 100%');

                        echo $dropDownList->render();

                        ?>
                    </div>




            </div>

            <div class="form-group">

                {!!Form::label('Sucursal')!!}
                {{$datos[0]->nombreSucursal}}

            </div>

            <div class="form-group">
                {!!Form::label('Estado')!!}
                {{$datos[0]->estadoSucursal}}
            </div>



        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <input type="submit" class="btn btn-primary" value="Guardar">
    </div>
</div>
{!!Form::close()!!}
