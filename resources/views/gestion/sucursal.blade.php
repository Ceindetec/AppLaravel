@extends('layouts.admin.principal')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		Gestion Sucursales
	</div>
	<div class="panel-body">
		<p></p>

		
		
		<?php

		//Inicializamos el Data Source de Transporte de lectura
		$read = new \Kendo\Data\DataSourceTransportRead();

		//Agregamos atributos al datasource de transporte de lectura
		$read
		->url('postbdsucursal')
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
	

		$nombreUsuario = new \Kendo\Data\DataSourceSchemaModelField('nombreUsuario');
		$nombreUsuario->type('string');

		$nombre = new \Kendo\Data\DataSourceSchemaModelField('nombre');
		$nombre->type('string');

		$direccion = new \Kendo\Data\DataSourceSchemaModelField('direccion');
		$direccion->type('string');

		$latitud = new \Kendo\Data\DataSourceSchemaModelField('latitud');
		$latitud->type('string');

		$longitud = new \Kendo\Data\DataSourceSchemaModelField('longitud');
		$longitud->type('string');

		$nombreEstablecimiento = new \Kendo\Data\DataSourceSchemaModelField('nombreEstablecimiento');
		$nombreEstablecimiento->type('string');

		$nombreCategoria = new \Kendo\Data\DataSourceSchemaModelField('nombreCategoria');
		$nombreCategoria->type('string');

		$estado = new \Kendo\Data\DataSourceSchemaModelField('estado');
		$estado->type('string');

		$accion = new \Kendo\Data\DataSourceSchemaModelField('accion');
		$accion-> type('string');


		//Agregamos las columnas al modelo de l grid
		$model
		->addField($nombreUsuario)
		->addField($nombre)
		->addField($direccion)
		->addField($latitud)
		->addField($longitud)
		->addField($nombreEstablecimiento)
		->addField($nombreCategoria)
		->addField($accion)
		->addField($estado);

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
		$nombreUsuario = new \Kendo\UI\GridColumn();
		$nombreUsuario->field('nombreUsuario')->title('Usuario');

		$nombre = new \Kendo\UI\GridColumn();
		$nombre->field('nombre')->title('Sucursal');

		$direccion = new \Kendo\UI\GridColumn();
		$direccion->field('direccion')->title('Direccion');

		$latitud = new \Kendo\UI\GridColumn();
		$latitud->field('latitud')->title('latitud');

		$longitud = new \Kendo\UI\GridColumn();
		$longitud->field('longitud')->title('longitud');

		$nombreEstablecimiento = new \Kendo\UI\GridColumn();
		$nombreEstablecimiento->field('nombreEstablecimiento')->title('Establecimiento');

		$nombreCategoria = new \Kendo\UI\GridColumn();
		$nombreCategoria->field('nombreCategoria')->title('Categoria');

		$estado = new \Kendo\UI\GridColumn();
		$estado->field('estado')->title('estado');

		$accion = new \Kendo\UI\GridColumn();
		$accion->field('accion')->title('Accion')->templateId('accion');

		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");

	    //agregamo columnas y atributos al grid
		$grid
		->addColumn( $nombreUsuario, $nombre, $direccion,$latitud,$longitud,$nombreEstablecimiento,$nombreCategoria,$estado,$accion)
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

