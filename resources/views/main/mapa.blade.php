@extends('layouts.general.principal')
@section('content')
	<div class="panel panel-primary">
		<div class="panel-body">
			{!!$map['html']!!}
		</div>
		<div class="panel-footer">
			
		</div>
	</div>		      		
@endsection

@section('scripts')
<!-- SCRIPT PARA TRAIDA DEL MAPA CON PHPGMAP -->
	<script type="text/javascript">
		var centreGot = false;
	</script>
	{!!$map['js']!!}
@endsection