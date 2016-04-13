@extends('layouts.admin.principal')

@section('content')




<div class="panel panel-primary">
	<div class="panel-heading">
		Titulo del panel
	</div>
	<div class="panel-body">
		<p>Cuepor del panel</p>
		<a href="../main/modaltest" class="btn btn-primary" data-modal="">Test modal pequeño</a>
		<a href="../main/modaltest" class="btn btn-primary" data-modal="modal-lg">Test modal grande</a>

		<a href="../main/modalformulario" class="btn btn-primary" data-modal="">Test modal formulario</a>

		
		<?php
		$color = new \Kendo\UI\DropDownList('algo');

		$color->value(1)
		//->change('onChange')
		->dataTextField('text')
		->dataValueField('value')
		->dataSource(array(
			array('text' => 'Black', 'value' => 1),
			array('text' => 'Orange', 'value' => 2),
			array('text' => 'Grey', 'value' => 3)
			))
		
		->attr('style', 'width: 100%');

		echo $color->render();
		?>


	</div>
	<div class="panel-footer">
		el footer del panel
	</div>
</div>

@endsection