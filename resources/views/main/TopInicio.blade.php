@extends('layouts.general.principal')
	@section('content')
        <div class="col-md-12">
            <div class="row">
                @foreach ($dataTops as $auxI) 
                    <div class="col-md-4">
                        <div class="panel panel-danger">
                            <div  align="center" class="panel-heading">
                                <div> <a href="{{$auxI[0] ->ruta }}"> <b>{{$auxI[0] ->tituloTop }}</b></a></div>
                            </div>
                            <div  align="center">
                                <div><a href="sucursalunica/{{ $auxI[0] ->idSucursal}}"><b>{{$auxI[0] ->nombreSucursal}} </b></a> &nbsp; <b>{{ $auxI[0] ->puntuacionSucursal }} </b></div>
                            </div>
                            <div class="panel-body">                                
                                <picture>
                                    <img src="data:image/png;base64,{!! $auxI[0] ->logoSucursal !!}" width="180" height="180" 
                                    alt="Imagen no disponible"/>
                                </picture>                                
                                <div >
                                    <div><b>Direccion:&nbsp;</b>{{ $auxI[0] ->direccionSucursal }} </div>
                                    <div><b>Teléfono:&nbsp;</b>{{ $auxI[0] ->telefonoSucursal }} </div>
                                    <div><b>Comida:&nbsp;</b>{{ $auxI[0] ->categoriaSucursal }} </div>
                                    <div><b>Votos:&nbsp;</b>{{ $auxI[0] ->cantidadVotos }} </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endsection