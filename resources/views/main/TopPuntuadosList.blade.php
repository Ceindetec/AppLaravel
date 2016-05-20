@extends('layouts.general.principal')
	@section('content')		
		<?php for ($i=0; $i<count($dataTopPuntadosList); $i++)
		{?>
			<div class="panel panel-danger">
				<div  align="center" class="panel-heading">
            		<div><a href="sucursalunica/{{ $dataTopPuntadosList[$i] ->idSucursal}}"><b>{{$dataTopPuntadosList[$i] ->nombreSucursal}}</b></a>&nbsp; <b>{{ $dataTopPuntadosList[$i] ->puntuacionSucursal }} </b></div>
        		</div>
		        <div class="panel-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="row">
		                        <div class="col-md-4">
		                            <picture>
		                                <img src="data:image/png;base64,{!! $dataTopPuntadosList[$i] ->logoSucursal !!}" width="180" height="180" 
		                                alt="Imagen no disponible"/>
                            		</picture>
		                        </div>
		                        <div class="col-md-4">
		                       		<div><b>Direccion:&nbsp;</b>{{ $dataTopPuntadosList[$i] ->direccionSucursal }} </div>
		                       		<div><b>Teléfono:&nbsp;</b>{{ $dataTopPuntadosList[$i] ->telefonoSucursal }} </div>
		                       		<div><b>Comida:&nbsp;</b>{{ $dataTopPuntadosList[$i]->categoriaSucursal }} </div>
		                       		<div><b>Votos:&nbsp;</b>{{ $dataTopPuntadosList[$i] ->cantidadVotos }} </div>
		                        </div>
		                        <!-- Sentencia en blanco para acomodar informacion -->
		                        <div class="col-md-4">
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
			</div>
		<?php
		}?>
	@endsection