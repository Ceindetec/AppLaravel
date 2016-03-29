@extends('layouts.admin.principal')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		Gestion
	</div>
	<div class="panel-body">
		<p>Menus</p>

		
		
		<?php
		$transport = new \Kendo\Data\DataSourceTransport();

		$read = new \Kendo\Data\DataSourceTransportRead();

		$read->url('postbdmenu')
		->contentType('application/json')
		->type('POST');

		$transport->read($read)
		->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

		$model = new \Kendo\Data\DataSourceSchemaModel();

		$idField = new \Kendo\Data\DataSourceSchemaModelField('id');
		$idField->type('number');

		
		$nombreField = new \Kendo\Data\DataSourceSchemaModelField('nombre');
		$nombreField->type('string');

		$descripcionField = new \Kendo\Data\DataSourceSchemaModelField('descripcion');
		$descripcionField->type('string');

		$establecimientoField = new \Kendo\Data\DataSourceSchemaModelField('establecimiento_id');
		$establecimientoField->type('string');

		$estadoField = new \Kendo\Data\DataSourceSchemaModelField('estado_id');
		$estadoField->type('string');


		$model->addField($idField)
		->addField($idField)
		
		->addField($nombreField)
		->addField($descripcionField)
		->addField($establecimientoField)
		->addField($estadoField);


		$schema = new \Kendo\Data\DataSourceSchema();
		$schema->data('data')
		->model($model)
		->total('total');

		$dataSource = new \Kendo\Data\DataSource();

		$dataSource->transport($transport)
		->pageSize(5)
		->schema($schema)
		->serverFiltering(true)
		->serverSorting(true)
		->serverPaging(true);

		$grid = new \Kendo\UI\Grid('grid');

		



		$nombre = new \Kendo\UI\GridColumn();
		$nombre->field('nombre')
		->title('nombre');

		$descripcion = new \Kendo\UI\GridColumn();
		$descripcion->field('descripcion')
		->title('descripcion');

		$establecimiento = new \Kendo\UI\GridColumn();
		$establecimiento->field('establecimiento_id')
		->title('establecimiento');

		$estado = new \Kendo\UI\GridColumn();
		$estado->field('estado_id')
		->title('estado');


		


		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");

		$grid->addColumn(  $nombre, $descripcion, $establecimiento, $estado)
		->dataSource($dataSource)
		->sortable(true)
		->filterable($gridFilterable)
		->pageable(true);

		echo $grid->render();
		?>
		<div id="grid2"></div>

	</div>
	<div class="panel-footer">
		el footer del panel
	</div>
</div>

@endsection

