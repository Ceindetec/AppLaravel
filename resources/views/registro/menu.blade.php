@extends('layouts.admin.principal')


@section('content')
    <body style="background-color: silver">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
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

                </div>
            </div>

            <div class="form -group">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">Platos del Menu</h3>
                    </div>
                    <div class="panel-body">
                        <div col-md-4>

                            <a href="modalplato" class="btn btn-primary" data-modal="modal-lg">Agregar Platos</a>

                                <p></p>

                        </div>
                        <div col-md-3>
                            <br>
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

    </body>

@endsection
