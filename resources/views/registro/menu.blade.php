@extends('layouts.admin.principal')


@section('content')
    <div class="container">
        <div class="col-md-10 col-md-offset-0">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Registro del Menu </h3>
                </div>
                {!!Form::open()!!}
                <div class="panel-body">
                    <form role="form">
                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('nombre', 'Nombre Del Menu: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('nombre',null,['class'=>'form-control', 'required',  'placeholder'=>'Nombre'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('nombre', 'Categoria')!!}
                            </div>
                            <div col-md-3>
                                <?php
                                $transport = new \Kendo\Data\DataSourceTransport();

                                $read = new \Kendo\Data\DataSourceTransportRead();

                                $read->url('getDropDownCategoria')
                                        ->contentType('application/json')
                                        ->type('POST');

                                $transport->read($read)
                                        ->parameterMap('function(data) {
                                return kendo.stringify(data);
           }');

                                $dataSource = new \Kendo\Data\DataSource();

                                $dataSource->transport($transport);


                                $dropDownList = new \Kendo\UI\DropDownList('categorias');

                                $dropDownList->dataSource($dataSource)
                                        ->dataTextField('nombre')
                                        ->dataValueField('id')
                                        ->attr('style', 'width: 100%');

                                echo $dropDownList->render();

                                ?>
                            </div>
                        </div>

                        <div class="col-sm-10 col-md-offset-0">
                            {!!Form::label('descripcion', 'Contenido: (*)')!!}</div>
                        <div class="col-sm-7 ">
                            {!!Form::textarea ('descripcion',null,['class'=>'form-control', 'required', 'placeholder'=>'Contenido','size' => '53x5'])!!}

                        </div>

                </div>
            </div>

            <div class="form -group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Platos del Menu</h3>
                    </div>


                    <div class="panel-body" id="menu">
                        <div class="col-md-12 text-left">
                            <p>
                                <a href="modalplato" class="btn btn-primary" data-modal="modal-lg">Agregar Platos</a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <input type="submit" class="btn btn-lg btn-success btn-block" value="Registrar"/>
            </form>
        </div>
        {!!Form::close()!!}
    </div>
    </div>
    </div>

@endsection

@section('scripts')

    <script>
        var datos = [];
        var conte = {};

        $(document).on("click", "#boton", function () {

            $('input[type="checkbox"]').each(function (index) {
                // console.log( index + ": " + $( this ).text() );

                if ($(this).is(':checked')) {
                    conte = {};
                    tr = $(this)[0].parentNode.parentNode;

                    tds = $(tr).children('td');

                    conte.id = $(tds[0]).text();
                    conte.nombre = $(tds[3]).text()
                    conte.imagen = $(tds[4]).html();
                    conte.descripcion = $(tds[5]).text();
                    datos.push(conte);

                }

            });

            for (i = 0; i < datos.length; i++) {

                var divPanel = document.createElement('div');
                $(divPanel).addClass('panel panel-success');

                var divTitulo = document.createElement('div');
                $(divTitulo).addClass('panel-heading');

                var divCuerpo = document.createElement('div');
                $(divCuerpo).addClass('panel-body');

                var htresTitulo = document.createElement('h3');
                $(htresTitulo).addClass('panel-title');
                htresTitulo.innerHTML = datos[i].nombre;

                var divcontenido = document.createElement('div');
                $(divcontenido).addClass('col-md-12');

                var divimagen = document.createElement('div');
                $(divimagen).addClass('col-md-2');
                divimagen.innerHTML = datos[i].imagen;

                var divinformacion = document.createElement('div')
                $(divinformacion).addClass('col-md-10');
                divinformacion.innerHTML = datos[i].descripcion;

                $(divcontenido).append(divimagen);
                $(divcontenido).append(divinformacion);

                $(divTitulo).append(htresTitulo);
                $(divCuerpo).append(divcontenido);
                $(divPanel).append(divTitulo);
                $(divPanel).append(divCuerpo);

                $("#menu").append(divPanel);



            }


            console.log(datos);


        })


    </script>

@endsection