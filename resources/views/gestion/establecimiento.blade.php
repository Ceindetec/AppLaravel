@extends('layouts.admin.principal')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		Gestion
	</div>
	<div class="panel-body">
		<p>Establecimiento</p>

		
		
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

		//Agregamos las columnas al modelo de l grid
		$model
		->addField($idEstablecimiento)
		->addField($nombreEstablecimiento)
		->addField($encargadoEstablecimiento)
		->addField($estadoEstablecimiento);

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

		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");

	    //agregamo columnas y atributos al grid
		$grid
		->addColumn( $idEstablecimiento, $nombreEstablecimiento, $encargadoEstablecimiento, $estadoEstablecimiento)
		->dataSource($dataSource)
		->sortable(true)
		->filterable($gridFilterable)
		->pageable(true);

		//renderizamos la grid
		echo $grid->render();
		?>
		<div id="grid2"></div>

	</div>
	<div class="panel-footer">
		el footer del panel
	</div>
</div>

@endsection