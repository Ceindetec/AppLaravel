@extends('layouts.admin.principal')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		Gestion Establecimiento
	</div>
	<div class="panel-body">
		<p></p>

		
		
		<?php

		//Inicializamos el Data Source de Transporte de lectura
		$read = new \Kendo\Data\DataSourceTransportRead();

		//Agregamos atributos al datasource de transporte de lectura
		$read
		->url('postbdestablecimiento')
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
		$model = new \Kendo\Data\DataSourceSchemaModel();

		//Inicializamos las columnas del Modelo
		$idEstablecimiento = new \Kendo\Data\DataSourceSchemaModelField('idEstablecimiento');
		$idEstablecimiento->type('number');

		$nombreEstablecimiento = new \Kendo\Data\DataSourceSchemaModelField('nombreEstablecimiento');
		$nombreEstablecimiento->type('string');

		$encargadoEstablecimiento = new \Kendo\Data\DataSourceSchemaModelField('encargadoEstablecimiento');
		$encargadoEstablecimiento->type('string');

		$estadoEstablecimiento = new \Kendo\Data\DataSourceSchemaModelField('estadoEstablecimiento');
		$estadoEstablecimiento->type('string');

		$accion = new \Kendo\Data\DataSourceSchemaModelField('accion');
		$accion-> type('string');


		//Agregamos las columnas al modelo de l grid
		$model
		->addField($idEstablecimiento)
		->addField($nombreEstablecimiento)
		->addField($encargadoEstablecimiento)
		->addField($estadoEstablecimiento)
		->addField($accion);
		//Inicializamos el esquema de la grid
		$schema = new \Kendo\Data\DataSourceSchema();

		//Agregamos los aributos del esquema de l grid
		$schema
		->data('data')
		->model($model)
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
		$idEstablecimiento = new \Kendo\UI\GridColumn();
		$idEstablecimiento->field('idEstablecimiento')->title('Id Establecimiento');

		$nombreEstablecimiento = new \Kendo\UI\GridColumn();
		$nombreEstablecimiento->field('nombreEstablecimiento')->title('Nombre Establecimiento');

		$encargadoEstablecimiento = new \Kendo\UI\GridColumn();
		$encargadoEstablecimiento->field('encargadoEstablecimiento')->title('Encargado Establecimiento');

		$estadoEstablecimiento = new \Kendo\UI\GridColumn();
		$estadoEstablecimiento->field('estadoEstablecimiento')->title('Estado');

		$accion = new \Kendo\UI\GridColumn();
		$accion->field('accion')->title('Accion')->templateId('accion');

		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");

	    //agregamo columnas y atributos al grid
		$grid
		->addColumn( $idEstablecimiento, $nombreEstablecimiento, $encargadoEstablecimiento, $estadoEstablecimiento, $accion)
		->dataSource($dataSource)
		->sortable(true)
		->filterable($gridFilterable)
		->dataBound('handleAjaxModal')
		->pageable(true);

		//renderizamos la grid
		echo $grid->render();
		?>
		<div id="grid2"></div>

	</div>
	<div class="panel-footer">
		
	</div>
</div>

<script id="accion" type="text/x-kendo-tmpl">


		
	<a href="../public/modalestablecimiento" class="btn btn-primary" data-modal="">Detalles</a>
    <button type="button" class="btn btn-success" data-dismiss="modal">Habilitar</button>
    <button type="button" class="btn btn-danger" data-dismiss="modal">Deshabilitar</button>

  
</script>


@endsection

