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
		                                <img src="data:image/png;base64,{!! $dataInfoSucursales[$i] ->logo !!}" width="150" height="180" />
		                            </picture>
		                        </div>
		                        <div class="col-md-4">
		                       		<div><b>Direccion:&nbsp;</b>{{ $dataInfoSucursales[$i] ->dirsucursal }} </div>
		                       		<div><b>Teléfono:&nbsp;</b>{{ $dataInfoSucursales[$i] ->telsucursal }} </div>
		                       		<div><b>Horario:&nbsp;</b>{{ $dataInfoSucursales[$i] ->horario }} </div>
		                       		<div><b>Categoria:&nbsp;</b>{{ $dataInfoSucursales[$i] ->categoria }} </div>
		                       		<div><b>Distancia:&nbsp;</b>{{ $dataInfoSucursales[$i] ->distancia }} <b>Km</b></div>
		                       		<div><b>Puntuación:&nbsp;</b>{{ $dataInfoSucursales[$i] ->puntuacion }} </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
			</div>
		<?php
		}?>
	@endsection
