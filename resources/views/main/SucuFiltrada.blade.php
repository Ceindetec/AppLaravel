@extends('layouts.general.principal')
	@section('content')		
		<?php for ($i=0; $i<count($dataInfoSucursales); $i++)
		{?>
			<div class="panel panel-primary">
				<div class="panel-heading">
            		<b>{{$dataInfoSucursales[$i] ->nomsucursal}} </b>
        		</div>
		        <div class="panel-body">
		            <div class="row">
		                <div class="col-md-12">
		                    <div class="row">
		                        <div class="col-md-2">
		                            <picture>
		                                <img src="data:image/png;base64,{!! $dataInfoSucursales[$i] ->logo !!}" width="200" height="250" />
		                            </picture>
		                        </div>
		                        <div class="col-md-4">
		                       		<br><b>Direccion:&nbsp;</b>{{ $dataInfoSucursales[$i] ->dirsucursal }} </br>
		                       		<br><b>Teléfono:&nbsp;</b>{{ $dataInfoSucursales[$i] ->telsucursal }} </br>
		                       		<br><b>Horario:&nbsp;</b>{{ $dataInfoSucursales[$i] ->horario }} </br>
		                       		<br><b>Categoria:&nbsp;</b>{{ $dataInfoSucursales[$i] ->categoria }} </br>
		                       		<br><b>Distancia:&nbsp;</b>{{ $dataInfoSucursales[$i] ->distancia }} <b>Km</b></br>
		                       		<br><b>Puntuación:&nbsp;</b>{{ $dataInfoSucursales[$i] ->puntuacion }} </br>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
			</div>
		<?php
		}?>
	@endsection
