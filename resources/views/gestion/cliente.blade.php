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

		$accion = new \Kendo\UI\GridColumn();
		$accion->field('accion')->title('Acción ')->templateId('accion');
		


		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");

		$grid->addColumn($idusuario,  $nombreusuario, $email, $telefono,$accion)
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

	<a href="modalcliente/#= idusuario#" class="btn btn-primary" data-modal="">Detalles</a>
	<?php $estado = "#= idusuario#" ?>
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
