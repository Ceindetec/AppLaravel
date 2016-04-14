@extends('layouts.general.principal')


@section('content')
<body style="background-color: silver">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Registro de Establecimiento	</h3>
                </div>
                {!!Form::open()!!}
                <div class="panel-body">
                    <form role="form">

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('nombre', 'Nombre Del Establecimiento: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('nombre',null,['class'=>'form-control', 'required',  'placeholder'=>'Establecimiento'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('correo', 'Correo Electronico: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('correo',null,['class'=>'form-control', 'required',  'placeholder'=>'ejemplo@gmail.com'])!!}
                            </div>
                        </div>

                         <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('web', 'Dirección Web: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('web',null,['class'=>'form-control',  'placeholder'=>'http://ejemplo.com'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('facebook', 'Facebook: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('facebook',null,['class'=>'form-control', 'placeholder'=>'Facebook'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('twitter', 'Twitter: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('twitter',null,['class'=>'form-control',  'placeholder'=>'Twitter'])!!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('instagram', 'Instagram: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('instagram',null,['class'=>'form-control',  'placeholder'=>'Instagram'])!!}
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
                            if (input.is("[name=password_confirmation]" )) {
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
