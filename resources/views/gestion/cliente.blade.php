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

		$model = new \Kendo\Data\DataSourceSchemaModel();

		$idField = new \Kendo\Data\DataSourceSchemaModelField('id');
		$idField->type('number');


		$usernameField = new \Kendo\Data\DataSourceSchemaModelField('username');
		$usernameField->type('string');

		$pnombreField = new \Kendo\Data\DataSourceSchemaModelField('primer_nombre');
		$pnombreField->type('string');

		$snombreField = new \Kendo\Data\DataSourceSchemaModelField('segundo_nombre');
		$snombreField->type('string');

		$papellidoField = new \Kendo\Data\DataSourceSchemaModelField('primer_apellido');
		$papellidoField->type('string');

		$sapellidoField = new \Kendo\Data\DataSourceSchemaModelField('segundo_apellido');
		$sapellidoField->type('string');


		$emailField = new \Kendo\Data\DataSourceSchemaModelField('email');
		$emailField->type('string');

		$telefonoField = new \Kendo\Data\DataSourceSchemaModelField('telefono');
		$telefonoField->type('string');
		$accion = new \Kendo\Data\DataSourceSchemaModelField('accion');
		$accion-> type('string');


		$model->addField($idField)
		->addField($idField)
	
		->addField($usernameField)
		->addField($pnombreField)
		->addField($snombreField)
		->addField($papellidoField)
		->addField($sapellidoField)
		->addField($emailField)
		->addField($accion)
		->addField($telefonoField);


		$schema = new \Kendo\Data\DataSourceSchema();
		$schema->data('data')
		->model($model)
		->total('total');

		$dataSource = new \Kendo\Data\DataSource();

		$dataSource->transport($transport)
		->pageSize(5)
		->schema($schema)
		->serverFiltering(true)
		->serverSorting(true)
		->serverPaging(true);

		$grid = new \Kendo\UI\Grid('grid');

	


		$username = new \Kendo\UI\GridColumn();
		$username->field('username')
		->title('username');

		$pnombre = new \Kendo\UI\GridColumn();
		$pnombre->field('primer_nombre')
		->title('Primer nombre');

		$snombre = new \Kendo\UI\GridColumn();
		$snombre->field('segundo_nombre')
		->title('Segundo nombre');

		$papellido = new \Kendo\UI\GridColumn();
		$papellido->field('primer_apellido')
		->title('Primer apellido');


		$sapellido = new \Kendo\UI\GridColumn();
		$sapellido->field('segundo_apellido')
		->title('Segundo apellido');

		$email = new \Kendo\UI\GridColumn();
		$email->field('email')
		->title('Email');

		$telefono = new \Kendo\UI\GridColumn();
		$telefono->field('telefono')
		->title('telefono');

		$accion = new \Kendo\UI\GridColumn();
		$accion->field('accion')->title('Accion')->templateId('accion');;

		


		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");

		$grid->addColumn(  $username, $pnombre, $snombre, $papellido, $sapellido, $email, $telefono,$accion)
		->dataSource($dataSource)
		->sortable(true)
		->filterable($gridFilterable)
		->dataBound('handleAjaxModal')
		->pageable(true);

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
<a href="../public/modalcliente" class="btn btn-primary" data-modal="">Detalles</a>
      <button type="button" class="btn btn-success" data-dismiss="modal">Habilitar</button>
      <button type="button" class="btn btn-danger" data-dismiss="modal">Deshabilitar</button>
</div>
  
</script>
