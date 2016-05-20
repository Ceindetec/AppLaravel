@extends('layouts.admin.principal')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		Gestion Platos de los Menus
	</div>
	<div class="panel-body">
		<p></p>

		
		
		<?php

		//Inicializamos el Data Source de Transporte de lectura
		$read = new \Kendo\Data\DataSourceTransportRead();

		//Agregamos atributos al datasource de transporte de lectura
		$read
		->url('postbdmenuplato')
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

		$idMenuPlato = new \Kendo\UI\GridColumn();
		$idMenuPlato->field('idMenuPlato')->title('idMenuPlato')->hidden(true);

		$nombreMenuPlato = new \Kendo\UI\GridColumn();
		$nombreMenuPlato->field('nombreMenuPlato')->title('Menú');

		$nombrePlato = new \Kendo\UI\GridColumn();
		$nombrePlato->field('nombrePlato')->title('Nombre');

		$valor = new \Kendo\UI\GridColumn();
		$valor->field('valor')->title('Valor');

		$estadoMenuPlato = new \Kendo\UI\GridColumn();
		$estadoMenuPlato->field('estadoMenuPlato')->title('Estado');

		$edicion = new \Kendo\UI\GridColumn();
		$edicion->field('edicion')->title('Edición ')->templateId('edicion');


		$accion = new \Kendo\UI\GridColumn();
		$accion->field('accion')->title('Acción ')->templateId('accion');



		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");

	    //agregamo columnas y atributos al grid
		$grid
		->addColumn( $idMenuPlato,$nombreMenuPlato, $nombrePlato, $valor, $estadoMenuPlato,$accion,$edicion)
		->dataSource($dataSource)
		->sortable(true)
		->filterable($gridFilterable)
				->groupable (true)
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

<script id="accion" type="text/x-kendo-tmpl">
	<?php $estado = "#= estadoMenuPlato#" ?>
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

	<a href="modaleditmenuplato/#= idMenuPlato#" class="btn btn-success" data-modal="">Editar</a>
    </script>