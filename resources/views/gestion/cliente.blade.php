@extends('layouts.admin.principal')

@section('content')
<div class="panel panel-primary">
	<div class="panel-heading">
		Gestion
	</div>
	<div class="panel-body">
		<p>Cliente</p>

		
		
		<?php
		$transport = new \Kendo\Data\DataSourceTransport();

		$read = new \Kendo\Data\DataSourceTransportRead();

		$read->url('postbdusuario')
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


		$model->addField($idField)
		->addField($idField)
	
		->addField($usernameField)
		->addField($pnombreField)
		->addField($snombreField)
		->addField($papellidoField)
		->addField($sapellidoField)
		->addField($emailField)
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

		


		$gridFilterable = new \Kendo\UI\GridFilterable();
	    $gridFilterable->mode("row");

		$grid->addColumn(  $username, $pnombre, $snombre, $papellido, $sapellido, $email, $telefono)
		->dataSource($dataSource)
		->sortable(true)
		->filterable($gridFilterable)
		->pageable(true);

		echo $grid->render();
		?>
		<div id="grid2"></div>

	</div>
	<div class="panel-footer">
		el footer del panel
	</div>
</div>

@endsection

