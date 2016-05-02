@extends('layouts.general.principal')


@section('content')
    <body style="background-color: silver">
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Registro de Plato </h3>
                </div>
                {!!Form::open()!!}
                <div class="panel-body">
                    <form role="form">

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('nombre', 'Nombre Del Plato: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('nombre',null,['class'=>'form-control', 'required',  'placeholder'=>'Nombre'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <?php
                            $transport = new \Kendo\Data\DataSourceTransport();

                            $read = new \Kendo\Data\DataSourceTransportRead();

                            $read->url('getcategoria')
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
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-10 col-md-offset-0">
                                    {!!Form::label('descripcion', 'Contenido: (*)')!!}</div>
                                <div class="col-sm-7 ">
                                    {!!Form::textarea ('descripcion',null,['class'=>'form-control', 'required', 'placeholder'=>'Contenido','size' => '53x10'])!!}

                                </div>

                                <div class="col-sm-5 col-md-offset-0"><b>Agregar Imagen</b></div>
                                <div class="col-sm-3  col-md-offset-0"> {!!Form::file('path')!!}</div>


                            </div>


                        </div>


                        <div class="form-group">
                            <input type="submit" class="btn btn-lg btn-success btn-block"
                                   value="Registrar"/>
                        </div>


                    </form>
                </div>
                {!!Form::close()!!}
            </div>
        </div>
    </div>

    </body>
    <script type="text/javascript">

        $(function () {
            validarFormulario();// validar forularios con kendo
        });

        function validarFormulario() {
            var container = $('form');

            kendo.init(container);

            container.kendoValidator({
                //organiza los mensajes personalizados
                messages: {
                    confirmaPasswords: "Contraseñas no coinciden",
                    required: "Este campo es obligatorio"
                },
                //define reglas si necesita tener mas  de solo el campo requerido
                rules: {
                    confirmaPasswords: function (input) {
                        if (input.is("[name=password_confirmation]") || input.is("[name=password]")) {
                            if (input.is("[name=password_confirmation]")) {
                                return input.val() === $("#password").val();
                            }
                            if (input.is("[name=password]")) {
                                return input.val() === $("#password_confirmation").val();
                            }
                        }
                        return true;
                    }
                }
            });
        }

    </script>
@endsection
