@extends('layouts.admin.principal')

@section('content')

    <div class="form-group">
        <a href="../registrosucursal/{id}" class="btn btn-success" data-modal="">Registrar Sucursal</a>


    </div>
    <?php

    for ($i = 0; $i < count($datos); $i++) {


    ?>
    <div class="panel panel-primary">
        <div class="panel-heading">
            <b>{{$datos[$i]->nombresucursal}} </b>
        </div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-4">
                            <picture>
                                <source
                                        media="(min-width: 650px)"
                                        srcset="http://vignette3.wikia.nocookie.net/outcast/images/f/f8/Imagen-no-disponible.png/revision/latest?cb=20160322191504&path-prefix=es">
                                <source
                                        media="(min-width: 465px)"
                                        srcset="">
                                <img
                                        src="http://vignette3.wikia.nocookie.net/outcast/images/f/f8/Imagen-no-disponible.png/revision/latest?cb=20160322191504&path-prefix=es"
                                        alt="not found">
                            </picture>
                        </div>
                        <div class="col-md-4">
                            <br><b>Establecimiento:&nbsp;</b>{{$datos[$i]->nombreEstablecimiento}} </br>
                            <br><b>Categoria:&nbsp;</b>{{$datos[$i]->nombreCategoria}} </br>

                        </div>
                        <div class="col-md-4">

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-footer " align="right">


            <a href="" class="btn btn-primary">Menus</a>


            <?php if ($datos[$i]->estado == 'activo') {?>

            <button type="button" class="btn btn-danger" data-dismiss="modal">Deshabilitar</button>
            <?php } ?>

            <?php if ($datos[$i]->estado == 'inactivo') {?>

            <button type="button" class="btn btn-success" data-dismiss="modal">Habilitar</button>
            <?php } ?>


            <a href="modaleditsucursal/{{$datos[$i]->idSucursal}}" class="btn btn-success" data-modal="">Editar</a>

        </div>
    </div>
    <?php
    }
    ?>

@endsection