@extends('layouts.admin.principal')

@section('content')

    <div class="panel panel-primary">
        <div class="panel-heading">
            Gestion Sucursales
        </div>
        <div class="panel-body">
            <p></p>

            <div class="form-group">
                <a href="../registrosucursal/<?php echo($idEstablecimiento); ?>" class="btn btn-success"  >Registrar Sucursal</a>

            </div>

            <?php

            //Inicializamos el Data Source de Transporte de lectura
            $read = new \Kendo\Data\DataSourceTransportRead();

            //Agregamos atributos al datasource de transporte de lectura
            $read
                    ->url('../getDatosSucursalById?id=' . $idEstablecimiento)
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

            //Inicializamos el Modelo para la grid



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
            $idSucursal = new \Kendo\UI\GridColumn();
            $idSucursal->field('idSucursal')->title('idSucursal')->hidden(true);

            $nombreUsuario = new \Kendo\UI\GridColumn();
            $nombreUsuario->field('nombreUsuario')->title('Cliente');

            $nombresucursal = new \Kendo\UI\GridColumn();
            $nombresucursal->field('nombresucursal')->title('Sucursal');

            $nombreEstablecimiento = new \Kendo\UI\GridColumn();
            $nombreEstablecimiento->field('nombreEstablecimiento')->title('Establecimiento');

            $nombreCategoria = new \Kendo\UI\GridColumn();
            $nombreCategoria->field('nombreCategoria')->title('Categoria');

            $estado = new \Kendo\UI\GridColumn();
            $estado->field('estado')->title('Estado');

            $informacion = new \Kendo\UI\GridColumn();
            $informacion->field('informacion')->title('Informacion ')->templateId('informacion');

            $accion = new \Kendo\UI\GridColumn();
            $accion->field('accion')->title('Acción')->templateId('accion');

            $edicion = new \Kendo\UI\GridColumn();
            $edicion->field('edicion')->title('Edición ')->templateId('edicion');



            $gridFilterable = new \Kendo\UI\GridFilterable();
            $gridFilterable->mode("row");

            //agregamo columnas y atributos al grid
            $grid
                    ->addColumn($idSucursal, $nombreUsuario, $nombresucursal, $nombreEstablecimiento, $nombreCategoria, $estado,  $informacion, $accion,$edicion)
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

@endsection

<script id="accion" type="text/x-kendo-tmpl">


#if(estado == 'activo'){#
			<button type="button" class="btn btn-danger" data-dismiss="modal">Deshabilitar</button>
		#}
		else{#
			<button type="button" class="btn btn-success" data-dismiss="modal">Habilitar</button>
		 #}#


</script>

<script id="edicion " type="text/x-kendo-tmpl">
    <a href="modalsucursal/#= idSucursal#" class="btn btn-success" data-modal="">Editar</a>

</script>


<script id="informacion" type="text/x-kendo-tmpl">
    <a href="modalsucursal/#= idSucursal#" class="btn btn-primary" data-modal="">Detalles</a>

</script>