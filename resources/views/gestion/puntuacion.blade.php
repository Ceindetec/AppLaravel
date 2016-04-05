@extends('layouts.admin.principal')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		Gestion Puntuacion
	</div>
	<div class="panel-body">
		<p></p>

		
		
		<?php

		//Inicializamos el Data Source de Transporte de lectura
		$read = new \Kendo\Data\DataSourceTransportRead();

		//Agregamos atributos al datasource de transporte de lectura
		$read
		->url('postbdpuntuacion')
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
	

		$nombreSucursal = new \Kendo\Data\DataSourceSchemaModelField('nombreSucursal');
		$nombreSucursal->type('string');

		$nombreUsuario = new \Kendo\Data\DataSourceSchemaModelField('nombreUsuario');
		$nombreUsuario->type('string');

		$comentario = new \Kendo\Data\DataSourceSchemaModelField('comentario');
		$comentario->type('string');

		$puntuacion = new \Kendo\Data\DataSourceSchemaModelField('puntuacion');
		$puntuacion->type('string');

		$fecha = new \Kendo\Data\DataSourceSchemaModelField('fecha');
		$fecha->type('string');

		$hora = new \Kendo\Data\DataSourceSchemaModelField('hora');
		$hora->type('string');

		$estadoPuntuacion = new \Kendo\Data\DataSourceSchemaModelField('estadoPuntuacion');
		$estadoPuntuacion->type('string');

		$accion = new \Kendo\Data\DataSourceSchemaModelField('accion');
		$accion-> type('string');


		//Agregamos las columnas al modelo de l grid
		$model
		->addField($nombreSucursal)
		->addField($nombreUsuario)
		->addField($comentario)
		->addField($puntuacion)
		->addField($fecha)
		->addField($hora)
		->addField($accion)
		->addField($estadoPuntuacion);

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
		$nombreSucursal = new \Kendo\UI\GridColumn();
		$nombreSucursal->field('nombreSucursal')->title('Sucursal');

		$nombreUsuario = new \Kendo\UI\GridColumn();
		$nombreUsuario->field('nombreUsuario')->title('Usuario');

		$comentario = new \Kendo\UI\GridColumn();
		$comentario->field('comentario')->title('Comentario');

		$puntuacion = new \Kendo\UI\GridColumn();
		$puntuacion->field('puntuacion')->title('Puntuacion');

		$fecha = new \Kendo\UI\GridColumn();
		$fecha->field('fecha')->title('Fecha');

		$hora = new \Kendo\UI\GridColumn();
		$hora->field('hora')->title('Hora');

		$estadoPuntuacion = new \Kendo\UI\GridColumn();
		$estadoPuntuacion->field('estadoPuntuacion')->title('estado');

		$accion = new \Kendo\UI\GridColumn();
		$accion->field('accion')->title('Accion')->templateId('accion');

		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");

	    //agregamo columnas y atributos al grid
		$grid
		->addColumn( $nombreSucursal, $nombreUsuario, $comentario,$puntuacion,$fecha,$hora,$estadoPuntuacion,$accion)
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

