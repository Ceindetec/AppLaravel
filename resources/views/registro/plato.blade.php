@extends('layouts.general.principal')


@section('content')
<body style="background-color: silver">
    <div class="container">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Registro de Plato	</h3>
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
                            <div col-md-4>
                                {!!Form::label('descripcion', 'Contenido: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('descripcion',null,['class'=>'form-control', 'required',  'placeholder'=>'Contenido'])!!}
                            </div>
                        </div>
                        
                        <div class="form-group">
                        <div class="row">
                              <div class="col-sm-4 col-md-offset-8"><b>Agregar Imagen</b></div>
                              <div class="col-sm-4 col-md-offset-8"> <input  class="btn btn-sm btn-success btn-primary" value="Subir"/></div>
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
