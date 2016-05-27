@extends('layouts.admin.principal')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		Gestion  Platos
	</div>
	<div class="panel-body">
		<p></p>

		<div class="form-group">
			<a href="registroplato" class="btn btn-success"  >Registrar Plato</a>

		</div>
		
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
		$idplato = new \Kendo\UI\GridColumn();
		$idplato->field('idPlatos')->title('id')->hidden(true);

		$nombreEstablecimiento = new \Kendo\UI\GridColumn();
		$nombreEstablecimiento->field('nombreEstablecimiento')->title('Establecimiento');

		$nombreCategoria = new \Kendo\UI\GridColumn();
		$nombreCategoria->field('nombreCategoria')->title('Categoría');

		$galeria = new \Kendo\UI\GridColumn();
		$galeria->field('galeria')->title('Galería')->hidden(true);


		$nombre = new \Kendo\UI\GridColumn();
		$nombre->field('nombre')->title('Nombre');

		$descripcion = new \Kendo\UI\GridColumn();
		$descripcion->field('descripcion')->title('Descripción');

		$estadoPlato = new \Kendo\UI\GridColumn();
		$estadoPlato->field('estadoPlato')->title('Estado');

		$accion = new \Kendo\UI\GridColumn();
		$accion->field('accion')->title('Acción')->templateId('accion');

		$edicion = new \Kendo\UI\GridColumn();
		$edicion->field('edicion')->title('Edición ')->templateId('edicion');


		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");



		$Column = new \Kendo\UI\GridColumn();
		$Column->field('ColumnName')
		->title('Galería')
		//->attributes(' bgcolor = '.getColorForValue(#: Column #) )
		->templateId('ColumnTemplate');	


	    //agregamo columnas y atributos al grid
		$grid
		->addColumn( $nombreEstablecimiento, $nombreCategoria, $galeria, $nombre, $descripcion, $estadoPlato, $Column,$accion,$edicion)
		->dataSource($dataSource)	
		->sortable(true)
		->filterable($gridFilterable)
		//muestra el modal
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

<script id="ColumnTemplate" type="text/x-kendo-tmpl">
   <img src="data:image/png;base64,#= galeria #" width="100" height="100" />
</script>

<script id="accion" type="text/x-kendo-tmpl">


	<?php $estado = "#= estadoPlato#" ?>
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

<script id="edicion" type="text/x-kendo-tmpl">

	<a href="modaleditplato/#= idPlatos#" class="btn btn-success">Editar</a>
    </script>