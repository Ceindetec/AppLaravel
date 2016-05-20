@extends('layouts.admin.principal')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">
            Gestion Establecimiento
        </div>
        <div class="panel-body">

            <div class="form-group">
                <a href="registroestablecimiento/admin" class="btn btn-success" data-modal="" >Registrar Marca Comercial</a>

            </div>

            <?php

            //Inicializamos el Data Source de Transporte de lectura
            $read = new \Kendo\Data\DataSourceTransportRead();

            //Agregamos atributos al datasource de transporte de lectura
            $read
                    ->url('postestablecimiento')
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


            $idestablecimiento = new \Kendo\UI\GridColumn();
            $idestablecimiento->field('idestablecimiento')->title('idestablecimiento')->hidden(true);

            $nombreEstablecimiento = new \Kendo\UI\GridColumn();
            $nombreEstablecimiento->field('nombreEstablecimiento')->title('Nombre');

            $encargadoEstablecimiento = new \Kendo\UI\GridColumn();
            $encargadoEstablecimiento->field('encargadoEstablecimiento')->title('Encargado ');

            $estadoEstablecimiento = new \Kendo\UI\GridColumn();
            $estadoEstablecimiento->field('estadoEstablecimiento')->title('Estado');


            $informacion = new \Kendo\UI\GridColumn();
            $informacion->field('informacion')->title('Informacion ')->templateId('informacion');


            $sucursal = new \Kendo\UI\GridColumn();
            $sucursal->field('sucursal')->title('Sucursal')->templateId('sucursal');;

            $accion = new \Kendo\UI\GridColumn();
            $accion->field('accion')->title('Acción ')->templateId('accion');

            $edicion = new \Kendo\UI\GridColumn();
            $edicion->field('edicion')->title('Edición ')->templateId('edicion');




            $gridFilterable = new \Kendo\UI\GridFilterable();
            $gridFilterable->mode("row");

            //agregamo columnas y atributos al grid
            $grid
                    ->addColumn($idestablecimiento, $nombreEstablecimiento, $encargadoEstablecimiento, $estadoEstablecimiento,$informacion,$sucursal,$accion, $edicion)
                    ->dataSource($dataSource)
                    ->sortable(true)
                    ->filterable($gridFilterable)
                    ->dataBound('handleAjaxModal')
                    ->pageable(true);

            //renderizamos la grid
            echo $grid->render();
            ?>


        </div>
        <div class="panel-footer">

        </div>
    </div>

    <script id="accion" type="text/x-kendo-tmpl">



		#if(estadoEstablecimiento == 'activo'){#
			<button type="button" class="btn btn-danger" data-dismiss="modal">Deshabilitar</button>
		#}
		else{#
			<button type="button" class="btn btn-success" data-dismiss="modal">Habilitar</button>
		 #}#
    </script>


    <script id="edicion" type="text/x-kendo-tmpl">

	<a href="modaleditestablecimiento/#= idestablecimiento#" class="btn btn-success" data-modal="">Editar</a>
    </script>


    <script id="informacion" type="text/x-kendo-tmpl">

	<a href="modalestablecimiento/#= idestablecimiento#" class="btn btn-primary" data-modal="">Detalles</a>

    </script>


    <script id="sucursal" type="text/x-kendo-tmpl">
    <a href="sucursal/#= idestablecimiento#"  class="btn btn-primary" >Gestionar</a>

    </script>


@endsection

