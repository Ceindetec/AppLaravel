@extends('layouts.general.principal')

	@section('content')
	{!!Form::open()!!}
		{!!Form::text('txtBuscar',null, ['id'=>'txtBuscar','class'=>'navbar-left', 'placeholder' => 'Buscar'])!!}
		{!!Form::hidden('latitud',null, ['id'=>'latitud'])!!}
		{!!Form::hidden('longitud',null, ['id'=>'longitud'])!!}
		{!!Form::submit('Buscar', ['id'=>'btnBuscar'])!!}
		{!!Form::close()!!}
	@endsection

	@section('scripts')
	<!--
		<script>
		$(function(){
			$("#btnBuscar").click(function() {
				var text = $("#txtBuscar").val();
				window.location.href='SucuFiltrada/'+text;
			});	
		});	
		-->
	<!-- SCRIPT PARA OBTENER LA GEOLOCALIZACION  -->
		<script>
			var latitud = document.getElementById("latitud");
			var longitud = document.getElementById("longitud");
			function getLocation() {
			    if (navigator.geolocation) {
			        navigator.geolocation.watchPosition(showPosition);
			    } else { 
			        alert("La geolocalización no es compatible con este navegador.");
			    }
			}
			function showPosition(position) {
				$(latitud).val(position.coords.latitude);
				$(longitud).val(position.coords.longitude);
			}
			window.onload = getLocation();
		</script>
	@endsection