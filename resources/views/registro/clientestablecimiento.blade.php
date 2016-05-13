@extends('layouts.admin.principal')

@section('content')
    <body style="background-color: silver">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Datos Restantes Necesarios "Cambiar el titulo"</h3>
                </div>
                {!!Form::open()!!}
                <div class="panel-body">
                    <form role="form">

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('email', 'email: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('email',null,['class'=>'form-control', 'required',  'placeholder'=>'email'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('facebook', 'facebook')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('facebook',null,['class'=>'form-control', 'required',  'placeholder'=>'facebook'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <?php
                            $numeroTelefonico = new \Kendo\UI\MaskedTextBox('numeroTelefonico');
                            $numeroTelefonico->value("");
                            $numeroTelefonico->mask("(0) 000 00 00");
                            ?>

                            <div class="form-group">
                                <div col-md-4>
                                    {!!Form::label('numeroTelefonico', 'Telefono:')!!}
                                </div>
                                <div col-md-3>
                                    {!!$numeroTelefonico->render()!!}
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
