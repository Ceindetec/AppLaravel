@extends('layouts.admin.principal')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		Gestion  Platos
	</div>
	<div class="panel-body">
		<p></p>

		
		
		<?php

		//Inicializamos el Data Source de Transporte de lectura
		$read = new \Kendo\Data\DataSourceTransportRead();

		//Agregamos atributos al datasource de transporte de lectura
		$read
		->url('postbdplatos')
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
	

		$nombreEstablecimiento = new \Kendo\Data\DataSourceSchemaModelField('nombreEstablecimiento');
		$nombreEstablecimiento->type('string');

		$nombreCategoria = new \Kendo\Data\DataSourceSchemaModelField('nombreCategoria');
		$nombreCategoria->type('string');

		$galeria = new \Kendo\Data\DataSourceSchemaModelField('galeria');
		$galeria->type('string');
		
		$accion = new \Kendo\Data\DataSourceSchemaModelField('accion');
		$accion-> type('string');




		$nombre = new \Kendo\Data\DataSourceSchemaModelField('nombre');
		$nombre->type('string');

		$descripcion = new \Kendo\Data\DataSourceSchemaModelField('descripcion');
		$descripcion->type('string');

		$estadoPlato = new \Kendo\Data\DataSourceSchemaModelField('estadoPlato');
		$estadoPlato->type('string');


		//Agregamos las columnas al modelo de l grid
		$model
		->addField($nombreEstablecimiento)
		->addField($nombreCategoria)
		->addField($galeria)
		->addField($nombre)
		->addField($descripcion)
		->addField($accion)
		->addField($estadoPlato);



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
		$nombreEstablecimiento = new \Kendo\UI\GridColumn();
		$nombreEstablecimiento->field('nombreEstablecimiento')->title('Establecimiento');

		$nombreCategoria = new \Kendo\UI\GridColumn();
		$nombreCategoria->field('nombreCategoria')->title('Categoria');

		$galeria = new \Kendo\UI\GridColumn();
		$galeria->field('galeria')->title('Galeria')->hidden(true);


		$nombre = new \Kendo\UI\GridColumn();
		$nombre->field('nombre')->title('Nombre');

		$descripcion = new \Kendo\UI\GridColumn();
		$descripcion->field('descripcion')->title('Descripcion');

		$estadoPlato = new \Kendo\UI\GridColumn();
		$estadoPlato->field('estadoPlato')->title('Estado');

		$accion = new \Kendo\UI\GridColumn();
		$accion->field('accion')->title('Accion')->templateId('accion');


		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");



		$Column = new \Kendo\UI\GridColumn();
		$Column->field('ColumnName')
		->title('galeria')
		//->attributes(' bgcolor = '.getColorForValue(#: Column #) )
		->templateId('ColumnTemplate');	


	    //agregamo columnas y atributos al grid
		$grid
		->addColumn( $nombreEstablecimiento, $nombreCategoria, $galeria, $nombre, $descripcion, $estadoPlato, $Column,$accion)
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

<script id="ColumnTemplate" type="text/x-kendo-tmpl">
   <img src="data:image/png;base64,#= galeria #" width="100" height="100" />
</script>

<script id="accion" type="text/x-kendo-tmpl">
<div>
	  
      <button type="button" class="btn btn-success" data-dismiss="modal">Habilitar</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Deshabilitar</button>
</div>
  
</script>
