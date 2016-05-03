@extends('layouts.general.principal')


@section('content')
    <body style="background-color: silver">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Horario de Sucursal </h3>
                </div>
                {!!Form::open()!!}
                <div class="panel-body">
                    <form role="form">

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('dia', 'Dia: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('dia',null,['class'=>'form-control', 'required',  'placeholder'=>'Dia'])!!}
                            </div>

                        </div>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('hora_apertura', 'Hora de Apertura: (*)')!!}
                            </div>
                            <div col-md-3>
                                <div col-md-3>
                                    <div id="example2">
                                        <div class="demo-section k-content">
                                            <input id="timepicker" value="10:00 AM" style="width: 100%;"/>


                                        </div>
                                        <script>
                                            $(document).ready(function () {
                                                // create TimePicker from input HTML element
                                                $("#timepicker").kendoTimePicker();
                                            });
                                        </script>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div col-md-4>
                                        {!!Form::label('hora_cierre', 'Hora de Cierre: (*)')!!}
                                    </div>
                                    <div col-md-3>
                                        <div id="example">
                                            <div class="demo-section k-content">
                                                <input id="timepicker2" value="10:00 AM" style="width: 100%;"/>


                                            </div>
                                            <script>
                                                $(document).ready(function () {
                                                    // create TimePicker from input HTML element
                                                    $("#timepicker2").kendoTimePicker();
                                                });
                                            </script>

                                        </div>
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
