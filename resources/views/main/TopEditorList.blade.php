@extends('layouts.general.principal')
	@section('content')	
		<?php for ($i=0; $i<count($dataTopEditorList); $i++)
		{?>
			<div class="panel panel-danger">
				<div  align="center" class="panel-heading">
            		<div><a href="sucursalunica/{{ $dataTopEditorList[$i] ->idSucursal}}"><b>{{$dataTopEditorList[$i] ->nombreSucursal}}</b></a>&nbsp; <b>{{ $dataTopEditorList[$i] ->puntuacionSucursal }} </b></div>
        		</div>
		        <div class="panel-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="row">
		                        <div class="col-md-4">
		                            <picture>
		                                <img src="data:image/png;base64,{!! $dataTopEditorList[$i] ->logoSucursal !!}" width="180" height="180" 
		                                alt="Imagen no disponible"/>
                            		</picture>
		                        </div>
		                        <div class="col-md-4">
		                       		<div><b>Direccion:&nbsp;</b>{{ $dataTopEditorList[$i] ->direccionSucursal }} </div>
		                       		<div><b>Teléfono:&nbsp;</b>{{ $dataTopEditorList[$i] ->telefonoSucursal }} </div>
		                       		<div><b>Comida:&nbsp;</b>{{ $dataTopEditorList[$i]->categoriaSucursal }} </div>
		                       		<div><b>Votos:&nbsp;</b>{{ $dataTopEditorList[$i] ->cantidadVotos }} </div>
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