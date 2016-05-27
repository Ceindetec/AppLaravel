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

		$idpuntuacion = new \Kendo\UI\GridColumn();
		$idpuntuacion->field('idPuntuacion')->title('id')->hidden(true);

		$nombreSucursal = new \Kendo\UI\GridColumn();
		$nombreSucursal->field('nombreSucursal')->title('Sucursal');

		$nombreUsuario = new \Kendo\UI\GridColumn();
		$nombreUsuario->field('nombreUsuario')->title('Usuario');

		$titulo = new \Kendo\UI\GridColumn();
		$titulo->field('titulo')->title('Titulo');

		$comentario = new \Kendo\UI\GridColumn();
		$comentario->field('comentario')->title('Comentario');

		$puntuacion = new \Kendo\UI\GridColumn();
		$puntuacion->field('puntuacion')->title('Puntuación');

		$fecha = new \Kendo\UI\GridColumn();
		$fecha->field('fecha')->title('Fecha');

		$hora = new \Kendo\UI\GridColumn();
		$hora->field('hora')->title('Hora');

		$estadoPuntuacion = new \Kendo\UI\GridColumn();
		$estadoPuntuacion->field('estadoPuntuacion')->title('Estado');

		$accion = new \Kendo\UI\GridColumn();
		$accion->field('accion')->title('Acción')->templateId('accion');



		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");

	    //agregamo columnas y atributos al grid
		$grid
		->addColumn( $nombreSucursal, $nombreUsuario,$titulo, $comentario,$puntuacion,$fecha,$hora,$estadoPuntuacion,$accion)
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
<?php $estado = "#= estadoPuntuacion" ?>
	<?php if($estado = "Estado activo"){
		?>
		<button type="button" class="btn btn-danger" data-dismiss="modal">Deshabilitar</button>
		<?php
	}else{
		?>
		<button type="button" class="btn btn-success" data-dismiss="modal">Habilitar</button>
		<?php
	}
	?>
</script>


