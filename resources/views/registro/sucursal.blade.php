
    <body style="background-color: silver">
    <div class="container">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Registro de la Sucursal </h3>
                </div>
                {!!Form::open(array('url' => 'procesarRegistroSucursal'))!!}
                <div class="panel-body">
                    <form role="form">

                        <div class="form-group">
                            <div col-md-4>
                                {!!Form::label('nombre', 'Nombre De la Sucursal: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('nombre',null,['class'=>'form-control', 'required',  'placeholder'=>''])!!}
                                {!!Form::hidden('establecimientoId',$id,['required'])!!}

                            </div>
                        </div>


                        <div class="form-group">
                            <?php
                            $transport = new \Kendo\Data\DataSourceTransport();

                            $read = new \Kendo\Data\DataSourceTransportRead();

                            $read->url('../getDropDownCategoria')
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
                            <div col-md-4>
                                {!!Form::label('direccion', 'Direccion: (*)')!!}
                            </div>
                            <div col-md-3>
                                {!!Form::text('direccion',null,['class'=>'form-control', 'required',  'placeholder'=>''])!!}
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


                        <div class="form-group">
                            <div col-md-3>
                                <div class="form-group">
                                    {!!Form::label('galeria_id', 'Imagen:')!!}

                                    <?php
                                    $upload = new \Kendo\UI\Upload('imagen');

                                    echo $upload->render();
                                    ?>



                                </div>
                                <div class="form-group">
                                    <div id="vista_previa"></div>
                                </div>
                            </div>
                        </div>



                        <div class="form-group">
                                <input type="submit" class="btn btn-lg btn-success btn-block" value="Registrar"/>

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


        function onSuccess(result) {
            result = JSON.parse(result)
            console.log(result);
            if (result.estado = true) {
                $.msgbox(result.mensaje, {type: 'success'}, function () {
                    if ($("#cambio").val() == 'admin') {
                        $("#grid").data('kendoGrid').dataSource.read();
                    } else {
                        window.location.reload();
                    }

                    modalBs.modal('hide');
                });
            }
        }

    </script>


