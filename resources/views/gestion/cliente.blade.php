@extends('layouts.admin.principal')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		Gestion Cliente
	</div>
	<div class="panel-body">
		<p></p>

		
		
		<?php
		$transport = new \Kendo\Data\DataSourceTransport();

		$read = new \Kendo\Data\DataSourceTransportRead();

		$read->url('postbusuario')
		->contentType('application/json')
		->type('POST');

		$transport->read($read)
		->parameterMap('function(data) {
			return kendo.stringify(data);
		}');

	
		$schema = new \Kendo\Data\DataSourceSchema();
		$schema->data('data')
		->total('total');

		$dataSource = new \Kendo\Data\DataSource();

		$dataSource->transport($transport)
		->pageSize(5)
		->schema($schema)
		->serverFiltering(true)
		->serverSorting(true)
		->serverPaging(true);

		$grid = new \Kendo\UI\Grid('grid');

	
		$idusuario = new \Kendo\UI\GridColumn();
		$idusuario->field('idusuario')->title('id')->hidden(true);


		$nombreusuario = new \Kendo\UI\GridColumn();
		$nombreusuario->field('nombreusuario')->title('Nombre');

		$email = new \Kendo\UI\GridColumn();
		$email->field('email')->title('E-mail');

		$telefono = new \Kendo\UI\GridColumn();
		$telefono->field('telefono')->title('Teléfono');

		$estadoUsuario = new \Kendo\UI\GridColumn();
		$estadoUsuario->field('estadoUsuario')->title('estadoUsuario')->hidden(true);

		$informacion = new \Kendo\UI\GridColumn();
		$informacion->field('informacion')->title('informacion ')->templateId('informacion');


		$accion = new \Kendo\UI\GridColumn();
		$accion->field('accion')->title('Acción ')->templateId('accion');

		$edicion = new \Kendo\UI\GridColumn();
		$edicion->field('edicion')->title('Edición ')->templateId('edicion');





		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");

		$grid->addColumn($idusuario,  $nombreusuario, $email, $telefono,$informacion,$accion,$estadoUsuario,$edicion)
		->dataSource($dataSource)
		->sortable(true)
		->filterable($gridFilterable)
		->dataBound('handleAjaxModal')
		->pageable(true);

		echo $grid->render();
		?>
	

	</div>
	<div class="panel-footer">
		
	</div>
</div>

@endsection

<script id="accion" type="text/x-kendo-tmpl">


		#if(estadoUsuario == 'activo'){#
			<button type="button" class="btn btn-danger" data-dismiss="modal">Deshabilitar</button>
		#}
		else{#
			<button type="button" class="btn btn-success" data-dismiss="modal">Habilitar</button>
		 #}#
</script>

<script id="informacion">
	<a href="modalcliente/#= idusuario#" class="btn btn-primary" data-modal="">Detalles</a>

</script>

<script id="edicion" type="text/x-kendo-tmpl">

	<a href="modaleditcliente/#= idusuario#" class="btn btn-success" data-modal="">Editar</a>


</script>

