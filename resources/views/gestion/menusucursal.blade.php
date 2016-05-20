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


		$idMenuSucursal = new \Kendo\UI\GridColumn();
		$idMenuSucursal->field('$idMenuSucursal')->title('ID')->hidden(true);

		$nombreMenu = new \Kendo\UI\GridColumn();
		$nombreMenu->field('nombreMenu')->title('Menú');

		$nombreSucursal = new \Kendo\UI\GridColumn();
		$nombreSucursal->field('nombreSucursal')->title('Sucursal');

		$estadoSucursal = new \Kendo\UI\GridColumn();
		$estadoSucursal->field('estadoSucursal')->title('Estado');

		$accion = new \Kendo\UI\GridColumn();
		$accion->field('accion')->title('Acción')->templateId('accion');

		$edicion = new \Kendo\UI\GridColumn();
		$edicion->field('edicion')->title('Edición ')->templateId('edicion');



		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");

	    //agregamo columnas y atributos al grid
		$grid
		->addColumn( $idMenuSucursal,$nombreMenu, $nombreSucursal, $estadoSucursal,$accion,$edicion)
		->dataSource($dataSource)	
		->sortable(true)
		->filterable($gridFilterable)
				->dataBound('handleAjaxModal')
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
<?php $estado = "#= estadoSucursal#" ?>
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

	<a href="modaleditmenusucursal/#= idMenuSucursal#" class="btn btn-success" data-modal="">Editar</a>
    </script>
