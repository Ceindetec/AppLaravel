


<div id="ModalRegistroEstablecimiento">
    <div class="panel panel-primary">


        <div class="panel-heading">

            <h4> Registro Marca Comercial </h4>
        </div>
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>

            <input type="hidden" value="<?php echo $cliente; ?>" name="cambio" id="cambio">

        <div class="col-md-12 ">
        <div class="modal-body">
          <div class="form-group">
              {!!Form::open(['route' => 'registroestablecimiento'])!!}
            <div class="panel-body">
                <form role="form">

                    <div class="form-group">
                        <div col-md-4>
                            {!!Form::label('nombre', 'Nombre De La Marca: (*)')!!}
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




                    <div class="form-group">
                        <input type="submit" class="btn btn-lg btn-success btn-block" value="Registrar"/>

                    </div>
                </form>
            </div>
            {!!Form::close()!!}

        </div>

        </div>
        </div>
        <div class="modal-footer">

        </div>
    </div>


</div>
</div>

<script>
    var modal = $('#ModalRegistroEstablecimiento');

    $(function(){
        validarFormulario();// validar forularios con kendo
        EventoFormularioModal(modal, onSuccess)
    });

    function validarFormulario(){
        /*metodo de kendo para validar los formulario*/
        $('form').kendoValidator({
            //organiza los mensajes personalizados
            messages: {

                customRule1: "Debete tener mas de 3 caracteres",
                required: "Este campo es obligatorio",
            }
        });
    }

    function onSuccess(result) {
        result = JSON.parse(result)
        console.log(result);
        if(result.estado=true){
            $.msgbox(result.mensaje, { type: 'success' }, function(){
                if($("#cambio").val()=='admin'){
                    $("#grid").data('kendoGrid').dataSource.read();
                }else{
                    window.location.reload();
                }

                modalBs.modal('hide');
            });
        }
    }


</script>


