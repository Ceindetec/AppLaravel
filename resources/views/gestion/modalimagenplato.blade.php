<div id="establecimiento">

    <div class="modal-header">

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title"> Seleccion de Imagen</h3>
            </div>
            <div class="modal-body">
                <?php

                //Inicializamos el Data Source de Transporte de lectura
                $read = new \Kendo\Data\DataSourceTransportRead();

                //Agregamos atributos al datasource de transporte de lectura
                $read
                        ->url('../postbdgaleria')
                        ->contentType('application/json')
                        ->type('POST');

                //Inicializamos el Data Source de Transporte
                $transport = new \Kendo\Data\DataSourceTransport();

                //Agregamos atributos al datasource de transporte
                $transport
                        ->read($read)
                        ->parameterMap('function(data) {
			return kendo.stringify(data);
		}');




                //Inicializamos el esquema de la grid
                $schema = new \Kendo\Data\DataSourceSchema();

                //Agregamos los aributos del esquema de l grid
                $schema
                        ->data('data')
                        ->total('total');

                //Inicializamos el Data Source
                $dataSource = new \Kendo\Data\DataSource();

                //Agregamos atributos al datasource
                $dataSource
                        ->transport($transport)
                        ->pageSize(5)
                        ->schema($schema)
                        ->serverFiltering(true)
                        ->serverSorting(true)
                        ->serverPaging(true);

                //Inicializamos la grid
                $grid = new \Kendo\UI\Grid('grid');

                //Inicializamos las columnas de la grid

                $grid = new \Kendo\UI\Grid('grid');

                //Inicializamos las columnas de la grid

                $idgaleria = new \Kendo\UI\GridColumn();
                $idgaleria->field('idGaleria')->title('id');



                $imagen = new \Kendo\UI\GridColumn();
                $imagen->field('imagen')->title('Imagen')->hidden(true);


                $accion = new \Kendo\UI\GridColumn();
                $accion->field('accion')->title('Acción')->templateId('accion')->width('20%');



                $Column = new \Kendo\UI\GridColumn();
                $Column->field('ColumnName')
                        ->title('Imagen')
                        //->attributes(' bgcolor = '.getColorForValue(#: Column #) )
                        ->templateId('ColumnTemplate');


                $gridFilterable = new \Kendo\UI\GridFilterable();
                $gridFilterable->mode("row");

                //agregamo columnas y atributos al grid
                $grid
                        ->addColumn($idgaleria, $imagen,  $Column,$accion)
                        ->dataSource($dataSource)
                        ->sortable(true)
                        ->filterable(false)
                        ->pageable(true);

                //renderizamos la grid
                echo $grid->render();
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal" id="boton">Guardar</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>

            </div>
        </div>



        <script id="ColumnTemplate" type="text/x-kendo-tmpl">
   <img src="data:image/png;base64,#= imagen #" width="100" height="100" />
</script>

        <script id="accion" type="text/x-kendo-tmpl">
    <input type="radio" name="check" value="#= idGaleria#"> Seleccionar <br>
        </script>

