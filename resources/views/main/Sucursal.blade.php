@extends('layouts.general.principal')	
	@section('content')
		<style> 
	      	#map {width:220px; height:180px; }
	    </style>
	    <!-- Informacion de la Sucursal seleccionada -->
		<div class="panel panel-danger">
			<div  align="center" class="panel-heading">
        		<div><b>{{$data['dataSucursal'][0] ->nombreSucursal}} </b> &nbsp; <b>{{ $data['dataSucursal'][0] ->puntuacionSucursal }} </b></div>
    		</div>
	        <div class="panel-body">
	            <div class="row">
	                <div class="col-md-12">
	                    <div class="row">
	                        <div class="col-md-4">
	                            <picture>
	                                <img src="data:image/png;base64,{!! $data['dataSucursal'][0]->logoSucursal !!}" width="180" height="180" 
	                                alt="Imagen no disponible"/>
	                            </picture>
	                        </div>
	                        <div class="col-md-4">
	                       		<div><b>Direccion:&nbsp;</b>{{ $data['dataSucursal'][0] ->direccionSucursal }} </div>
	                       		<div><b>Teléfono:&nbsp;</b>{{ $data['dataSucursal'][0] ->telefonoSucursal }} </div>
	                       		<div><b>Comida:&nbsp;</b>{{ $data['dataSucursal'][0] ->categoriaSucursal }} </div>
	                        </div>
	                        <!-- Sentencia en blanco para acomodar informacion -->
	                        <div class="col-md-4">
	                        	<div id="map"></div>
	                        </div>
	                    </div>
	                </div>
	            </div>

				<!--  Mostreo de Comentarios -->
				<br></br>
				<div class="panel panel-success">
					<div  align="center" class="panel-heading">
	            		<div> <b>Comentarios</b></div>
	        		</div>
	        	</div>
				@for ($i=0; $i<count($data['dataComentariosPuntuacion']); $i++)
		        	<div class="panel panel-success">
				        <div class="panel-body">
				            <div class="row">
				                <div class="col-md-12">
				                    <div class="row">
				                        <div class="col-md-3">
				                            <picture>
				                                <img src="data:image/png;base64,{!! $data['dataComentariosPuntuacion'][$i]->avatarComentario !!}" width="120" height="120" 
				                                alt="Imagen no disponible"/>
				                            </picture>
				                            <div>{!! $data['dataComentariosPuntuacion'][$i] ->nombreUsuario !!}</div>
				                        </div>
				                        <div class="col-md-9">
				                       		<div><b> {!! $data['dataComentariosPuntuacion'][$i] ->tituloComentario !!} </b></div>
				                       		<div> {!! $data['dataComentariosPuntuacion'][$i] ->puntuacionComentario !!} </div>
				                       		<div class="panel panel-default">
					                       		<div class="panel-body">
												    <p align="justify"> {!! $data['dataComentariosPuntuacion'][$i] ->textoComentario !!} </p>
												</div>
											</div>
				                        </div>
				                    </div>
				                </div>
				            </div>
				        </div>
					</div>
				@endfor
		    </div>
		</div>
	@endsection

	@section('scripts')
		<script async defer	src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAIZnoKIYQ-R42cJYi00h3aZ6UW6uDAFbg&callback=IniciarMapa"></script>

		<script>
			function IniciarMapa() {
				/* Variable que contiene Latitud y Longitud Traida del Procedimiento Almacenado	*/
				var LatLng = {lat: <?php echo $data['dataSucursal'][0]->latitudSucursal; ?>, lng: <?php echo $data['dataSucursal'][0]->longitudSucursal; ?>};

				/* Variable para declarar el mapa, asignandole los atributos de centrado y de zoom */
				var map = new google.maps.Map(document.getElementById('map'), {
					zoom: 16,
					center: LatLng
				});

				/* Variable que asigna el marcador */
				var marker = new google.maps.Marker({
					position: LatLng,
					map: map,
					title: '<?php echo $data['dataSucursal'][0]->nombreSucursal; ?>'
				});
			}
		</script>
	@endsection