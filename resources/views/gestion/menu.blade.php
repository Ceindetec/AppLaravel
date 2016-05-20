@extends('layouts.admin.principal')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		Gestion Menus
	</div>
	<div class="panel-body">

		<div class="form-group">
			<a href="registromenu" class="btn btn-primary" data="">Agregar Menu</a>

		</div>

		
		<?php

		//Inicializamos el Data Source de Transporte de lectura
		$read = new \Kendo\Data\DataSourceTransportRead();

		//Agregamos atributos al datasource de transporte de lectura
		$read
		->url('postbdmenu')
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

		$idMenu = new \Kendo\UI\GridColumn();
		$idMenu->field('$idMenu')->title('id')->hidden(true);

		$nombreMenu = new \Kendo\UI\GridColumn();
		$nombreMenu->field('nombreMenu')->title('Nombre');

		$descripcionMenu = new \Kendo\UI\GridColumn();
		$descripcionMenu->field('descripcionMenu')->title('Descripción');

		$establecimientoMenu = new \Kendo\UI\GridColumn();
		$establecimientoMenu->field('establecimientoMenu')->title('Establecimiento');

		$estadoMenu = new \Kendo\UI\GridColumn();
		$estadoMenu->field('estadoMenu')->title('Estado');

		$accion = new \Kendo\UI\GridColumn();
		$accion->field('accion')->title('Acción ')->templateId('accion');;


		$edicion = new \Kendo\UI\GridColumn();
		$edicion->field('edicion')->title('Edición ')->templateId('edicion');

		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");

	    //agregamo columnas y atributos al grid
		$grid
		->addColumn($idMenu,$nombreMenu, $descripcionMenu, $establecimientoMenu, $estadoMenu,$accion,$edicion)
		->dataSource($dataSource)
		->sortable(true)
		->dataBound('handleAjaxModal')
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


		
	
	<?php $estado = "#= estadoMenu#" ?>
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

	<a href="modaleditmenu/#= idMenu#" class="btn btn-success" data-modal="">Editar</a>


</script>
