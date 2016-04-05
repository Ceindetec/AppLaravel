@extends('layouts.admin.principal')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		Gestion Sucursales de Menus
	</div>
	<div class="panel-body">
		<p></p>

		
		
		<?php

		//Inicializamos el Data Source de Transporte de lectura
		$read = new \Kendo\Data\DataSourceTransportRead();

		//Agregamos atributos al datasource de transporte de lectura
		$read
		->url('postbdmenusucursal')
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
	

		$nombreMenu = new \Kendo\Data\DataSourceSchemaModelField('nombreMenu');
		$nombreMenu->type('string');

		$nombreSucursal = new \Kendo\Data\DataSourceSchemaModelField('nombreSucursal');
		$nombreSucursal->type('string');

		$estadoSucursal = new \Kendo\Data\DataSourceSchemaModelField('estadoSucursal');
		$estadoSucursal->type('string');


		$accion = new \Kendo\Data\DataSourceSchemaModelField('accion');
		$accion-> type('string');


		//Agregamos las columnas al modelo de l grid
		$model
		->addField($nombreMenu)
		->addField($nombreSucursal)
		->addField($accion)
		->addField($estadoSucursal);

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
		$nombreMenu = new \Kendo\UI\GridColumn();
		$nombreMenu->field('nombreMenu')->title('Menu');

		$nombreSucursal = new \Kendo\UI\GridColumn();
		$nombreSucursal->field('nombreSucursal')->title('Sucursal');

		$estadoSucursal = new \Kendo\UI\GridColumn();
		$estadoSucursal->field('estadoSucursal')->title('estado');

		$accion = new \Kendo\UI\GridColumn();
		$accion->field('accion')->title('Accion')->templateId('accion');


		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");

	    //agregamo columnas y atributos al grid
		$grid
		->addColumn( $nombreMenu, $nombreSucursal, $estadoSucursal,$accion)
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
	
	</div>
</div>

@endsection

<script id="accion" type="text/x-kendo-tmpl">
<div>

      <button type="button" class="btn btn-success" data-dismiss="modal">Habilitar</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Deshabilitar</button>
</div>
  
</script>
